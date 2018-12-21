<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\RestriCalendar;
use app\models\Aula;
use app\models\Sede;
use app\models\Comision;
use app\models\Carrera;
use app\models\Instituto;
use app\models\Materia;
use app\models\Users;
use app\models\User;
use app\models\RestriCalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Hora;
use DateTime;
use DatePeriod;
use DateInterval;
use app\models\EventoCalendar;
use yii\bootstrap\Modal;
use app\models\CarreraMateria;
use yii\helpers\VarDumper;
use yii\helpers\Url;
use app\models\EventoCalendarSearch;

/**
 * RestriController implements the CRUD actions for RestriCalendar model.
 */
class RestriController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserAdmin(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                        'actions' => [],
                        'allow' => false,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserSimple(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                    //Los usuarios guest tienen permisos sobre las siguientes acciones
                        'actions' => [],
                        'allow' => false,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserGuest(Yii::$app->user->identity->id);
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RestriCalendar models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $aula = Aula::findOne($id);
        return $this->render('index', [
            'id_aula' => $id,
            'aula' => $aula,
        ]);
    }
    /**
     * Creates a new RestriCalendar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_aula)
    {
        $model = new RestriCalendar();

        if ($model->load(Yii::$app->request->post())) {
            $model->ID_User_Asigna = Yii::$app->user->identity->id;
            $model->ID_Aula = $id_aula;
            if ($model->save()) {

                return $this->redirect(['index', 'id' => $model->ID_Aula]);
            }
        }
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing RestriCalendar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionUpd()
    {
        $request = Yii::$app->request;
        $evento = $this->findModel($request->post('id'));
        $evento->dow = $request->post('dow');
        $evento->Hora_ini = substr($request->post('ini'), -8);
        $evento->Hora_fin = substr($request->post('fin'), -8);
        if ($evento->save()) {
            echo ("Actualizacion exitosa");
        }
    }
    public function actionUpd2()
    {
        $request = Yii::$app->request;
        $evento = $this->findModel($request->post('id'));

        $ini = $request->post('ini');
        $fin = $request->post('ini');

        $evento->ID_User_Asigna = Yii::$app->user->identity->id;
        $evento->Hora_ini = substr($request->post('ini'), -8);
        $evento->Hora_fin = substr($request->post('fin'), -8);
        $evento->ID_Aula = $request->post('id_aula');
        if ($evento->save()) {
            echo ("Actualizacion exitosa");
        }
        return $this->redirect(['index', 'id_aula' => $id_aula]);

    }
    public function actionUpdscheduler()
    {
        $request = Yii::$app->request;
        $evento = $this->findModel($request->post('id'));

        $evento->Hora_ini = substr($request->post('ini'), -8);
        $evento->Hora_fin = substr($request->post('fin'), -8);
        $evento->ID_Aula = $request->post('aula_id');
        $evento->dow = $request->post('dow');
        if ($evento->save()) {
            echo ("Actualizacion exitosa");
        }
    }

    /**
     * Deletes an existing RestriCalendar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
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
        return $this->redirect(['index', 'id' => $id_aula]);
    }

    public function actionJsonresources($id_sede, $start = null, $end = null, $_ = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $resources = array();
        $sede = Sede::findOne($id_sede);
        $aulas = array();
        if (!empty($sede->edificios)) {
            foreach ($sede->edificios as $edi) {
                if (!empty($edi->aulas)) {
                    foreach ($edi->aulas as $aula) {
                        $aulas[] = $aula;
                    }
                }
            }
        }
        if (!empty($aulas)) {
            foreach ($aulas as $aula) {
                $resource = array();

                $arrayRecu = array();
                foreach ($aula->rECURSOs as $recu) {
                    $arrayRecu[] = '-' . $recu->NOMBRE;

                }
                if (!empty($arrayRecu)) {
                    $recursosAula = implode("\n", $arrayRecu);
                    $resource['recursos'] = $recursosAula;
                } else {
                    $resource['recursos'] = '-';
                }
                $resource['id'] = $aula->ID;
                $resource['title'] = $aula->NOMBRE;
                $resource['edificio'] = $aula->eDIFICIO->NOMBRE;
                $resource['url'] = URL::toRoute('restri/index?id=') . $aula->ID;
                $obj = (object)$resource;

                $resources[] = $obj;
            }
        }

        return $resources;
    }
    public function actionJsoncalendar($id = null, $start = null, $end = null, $_ = null)
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $aula = Aula::findOne($id);
        //RESTRICCIONES
        foreach ($aula->restriCalendars as $cons) {

            $begin = new DateTime($cons->ciclo->fecha_inicio);
            $end = new DateTime($cons->ciclo->fecha_fin);

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dia) {
                if ($dia->format('N') == $cons->dow) {

                    $restri = array();
                    $restri['id'] = intval($cons->id) . 'R';
                    $restri['title'] = $cons->instituto->NOMBRE;
                    $restri['ranges'] = [array('start' => $cons->ciclo->fecha_inicio, 'end' => $cons->ciclo->fecha_fin)];
                    $restri['start'] = $dia->format('Y-m-d') . 'T' . $cons->Hora_ini;
                    $restri['end'] = $dia->format('Y-m-d') . 'T' . $cons->Hora_fin;
                    $restri['backgroundColor'] = $cons->instituto->COLOR_HEXA;
                    $restri["editable"] = true;
                    $restri['overlap'] = false;
                    $restri['resourceId'] = $cons->ID_Aula;
                    $restri['usermodifico'] = $cons->ID_User_Asigna;
                    $restri['ajeno'] = false;
                    $tasks[] = (object)$restri;
                }
            }
        }
        return $tasks;
    }

    public function actionJsonschedulersede($id_sede, $start, $end = null, $_ = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $tasks = array();
        $sede = Sede::findOne($id_sede);
        $aulas = array();
        if (!empty($sede->edificios)) {
            foreach ($sede->edificios as $edi) {

                if (!empty($edi->aulas)) {
                    foreach ($edi->aulas as $aula) {                        
                        //RESTRICCIONES
                        foreach ($aula->restriCalendars as $cons) {
                            $begin = new DateTime($cons->ciclo->fecha_inicio);
                            $end = new DateTime($cons->ciclo->fecha_fin);

                            $interval = DateInterval::createFromDateString('1 day');
                            $period = new DatePeriod($begin, $interval, $end);

                            foreach ($period as $dia) {
                                if ($dia->format('N') == intval($cons->dow)) {
                                    $restri = array();
                                    $restri['id'] = intval($cons->id) . 'R';
                                    $restri['title'] = $cons->instituto->NOMBRE;
                                    $restri['ranges'] = [array('start' => $cons->ciclo->fecha_inicio, 'end' => $cons->ciclo->fecha_fin)];
                                    $restri['start'] = $dia->format('Y-m-d') . 'T' . $cons->Hora_ini;
                                    $restri['end'] = $dia->format('Y-m-d') . 'T' . $cons->Hora_fin;
                                    $restri['backgroundColor'] = $cons->instituto->COLOR_HEXA;
                                    $restri["editable"] = true;
                                    $restri['overlap'] = false;
                                    $restri['usermodifico'] = $cons->ID_User_Asigna;
                                    $restri['ajeno'] = false;
                                    $restri['resourceId'] = $cons->ID_Aula;
                                    $tasks[] = (object)$restri;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $tasks;
    }

    /**
     * Finds the RestriCalendar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RestriCalendar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RestriCalendar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
