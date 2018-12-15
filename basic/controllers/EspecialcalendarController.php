<?php

namespace app\controllers;

use Yii;
use app\models\EspecialCalendar;
use app\models\EspecialcalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Materia;
use app\models\Carrera;
use app\models\Users;
use app\models\User;
use app\models\Aula;
use app\models\Sede;

/**
 * EspecialcalendarController implements the CRUD actions for EspecialCalendar model.
 */
class EspecialcalendarController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EspecialCalendar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EspecialcalendarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EspecialCalendar model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EspecialCalendar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_aula, $sch = NULL)
    {

        $materia = new Materia();
        $carrera = new Carrera();
        $model = new EspecialCalendar();
        $model->ID_UCrea = Yii::$app->user->identity->id;
        $model->ID_UModifica = Yii::$app->user->identity->id;
        $r = Yii::$app->request;

        if ($model->load(Yii::$app->request->post())) {
            $dynmodel = $r->post('DynamicModel');
            $model->inicio = $dynmodel['fecha_inicio'] . 'T' . $dynmodel['hora_inicio'];
            $model->fin = $dynmodel['fecha_inicio'] . 'T' . $dynmodel['hora_fin'];
            $model->ID_Aula = $id_aula;
            if ($model->save()) {
                if($sch != NULL){
                    return $this->redirect(['edificio/scheduler', 'id' => Aula::findOne($model->ID_Aula)->eDIFICIO->sEDE->ID]);
                }
                else{
                    return $this->redirect(['evento/index', 'id' => $model->ID_Aula]);
                }
                
            } else {
                return $this->renderAjax('create', ['model' => $model, 'materia' => $materia, 'carrera' => $carrera]);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model, 'materia' => $materia, 'carrera' => $carrera
        ]);
    }

    /**
     * Updates an existing EspecialCalendar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpd()
    {
        $request = Yii::$app->request;
        $evento = $this->findModel($request->post('id'));

        $evento->inicio = $request->post('ini');
        $evento->fin = $request->post('fin');
        $evento->ID_UModifica = Yii::$app->user->identity->id;
        if ($evento->save()) {
            echo ("Actualizacion exitosa");
        }
    }

    public function actionUpdscheduler()
    {
        $request = Yii::$app->request;
        $evento = $this->findModel($request->post('id'));

        $evento->inicio = $request->post('ini');
        $evento->fin = $request->post('fin');
        $evento->ID_Aula = $request->post('aula_id');
        $evento->ID_UModifica = Yii::$app->user->identity->id;
        if ($evento->save()) {
            echo ("Actualizacion exitosa");
        }
    }

    /**
     * Deletes an existing EspecialCalendar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $request = Yii::$app->request;
        $this->findModel($request->post('id'))->delete();
        $id_aula = $request->post('id_aula');

        if ($request->post('scheduler') == 1) {
            $id_sede = $request->post('id_sede');
            return $this->redirect(['edificio/scheduler', 'id_sede' => $id_sede]);
        }
        return $this->redirect(['evento/index', 'id' => $id_aula]);
    }

    /**
     * Finds the EspecialCalendar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EspecialCalendar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EspecialCalendar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Servicios CALENDAR
    public function actionJsoncalendar($id = null, $start = null, $end = null, $_ = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $isGuest = User::isUserGuest(Yii::$app->user->identity->id);
        $isAdmin = User::isUserAdmin(Yii::$app->user->identity->id);
        if (!$isGuest) {
            $instIdOnSessionUser = Users::findOne(Yii::$app->user->identity->id)->idInstituto;
        }

        $aula = Aula::findOne($id);
        foreach ($aula->especialCalendars as $eve) {
            $event = array();
            // evento especial.
            $event['especial'] = true;
            // con sufijo U de unico.
            $event['id'] = intval($eve->id) . 'U';
            $event['title'] = $eve->nombre;
            $event['color'] = '#666666';
            $event['ajeno'] = true;
            if ($isGuest) {
                $event['ajeno'] = true;
                $event['editable'] = false;
            }
            if ($isAdmin) {
                $event['ajeno'] = false;
                $event['editable'] = true;
            }
            if ($eve->carrera != null) {
                $event['color'] = $eve->carrera->iNSTITUTO->COLOR_HEXA;
                if ($instIdOnSessionUser == $eve->carrera->iNSTITUTO->ID) {
                    $event['ajeno'] = false;
                    $event['editable'] = true;
                }
            }
            if ($eve->descripcion != null) {
                $event['description'] = $eve->descripcion;
            }

            $event['start'] = $eve->inicio;
            $event['end'] = $eve->fin;
            $event['usermodifico'] = $eve->ID_UModifica;
            $event['usercrea'] = $eve->ID_UCrea;
            $event['resourceId'] = $eve->ID_Aula;
            $tasks[] = (object)$event;
        }
        return $tasks;
    }

    public function actionJsonschedulersede($id_sede, $start, $end = null, $_ = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $isGuest = User::isUserGuest(Yii::$app->user->identity->id);
        $isAdmin = User::isUserAdmin(Yii::$app->user->identity->id);
        if (!$isGuest) {
            $instIdOnSessionUser = Users::findOne(Yii::$app->user->identity->id)->idInstituto;
        }

        $tasks = array();
        $sede = Sede::findOne($id_sede);
        if (!empty($sede->edificios)) {
            foreach ($sede->edificios as $edi) {

                if (!empty($edi->aulas)) {
                    foreach ($edi->aulas as $aula) {                        
                        //EVENTOS
                        foreach ($aula->especialCalendars as $eve) {
                            $event = array();
                            // evento especial.
                            $event['especial'] = true;
                            // con sufijo U de unico.
                            $event['id'] = intval($eve->id) . 'U';
                            $event['title'] = $eve->nombre;
                            $event['color'] = '#666666';
                            $event['ajeno'] = true;
                            if ($isGuest) {
                                $event['ajeno'] = true;
                                $event['editable'] = false;
                            }
                            if ($isAdmin) {
                                $event['ajeno'] = false;
                                $event['editable'] = true;
                            }
                            if ($eve->carrera != null) {
                                $event['color'] = $eve->carrera->iNSTITUTO->COLOR_HEXA;
                                if ($instIdOnSessionUser == $eve->carrera->iNSTITUTO->ID) {
                                    $event['ajeno'] = false;
                                    $event['editable'] = true;
                                }
                            }
                            if ($eve->descripcion != null) {
                                $event['description'] = $eve->descripcion;
                            }

                            $event['start'] = $eve->inicio;
                            $event['end'] = $eve->fin;
                            $event['usermodifico'] = $eve->ID_UModifica;
                            $event['usercrea'] = $eve->ID_UCrea;
                            $event['resourceId'] = $eve->ID_Aula;
                            $tasks[] = (object)$event;
                        }
                    }
                }
            }
        }
        return $tasks;
    }
}
