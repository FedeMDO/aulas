<?php

namespace app\controllers;

use Yii;
use app\models\RestriCalendar;
use app\models\Aula;
use app\models\Users;
use app\models\Instituto;
use app\models\RestriCalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Hora;

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
    $events = RestriCalendar::find()->all();
    $institutos = Instituto::find()->all();
    foreach ($events as $eve) {
        $instituto= Instituto::findOne($eve->ID_Instituto_Recibe)->NOMBRE;
        $event = new \yii2fullcalendar\Models\Event();
        $event->title=$instituto;
        $event->start = (string)$eve->Fecha_ini.'T'.(string)$eve->Hora_ini;
        $event->end = (string)$eve->Fecha_ini.'T'.(string)$eve->Hora_fin;
        $event->backgroundColor=Instituto::findOne($eve->ID_Instituto_Recibe)->COLOR_HEXA;
        $tasks[] = $event;
    }
    return $this->render('index', [
      'events'=>$tasks, 'institutos' => $institutos, 'id_aula'=> $id,
    ]);
}
    /**
     * Creates a new RestriCalendar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date, $date2)
    {
        //$date2 = 1;
        //$date = '2018-10-10';
        $model = new RestriCalendar();
        $aula1= Aula::findOne($date2)->NOMBRE;
        $model->Fecha_ini = $date;
        $model->ID_Aula = $date2;
        $model->Periodo_Academico = '2018';
        $institutos = Instituto::find()->all();
        $usuarios = Users::find()->where(['not', ['username' => Yii::$app->user->identity->username]])
        ->andWhere(['activate' =>1])->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $date2]);
        }
        else{
            return $this->renderAjax('create', [
                'model' => $model, 'aula1' => $aula1, 'institutos' => $institutos, 'usuarios' => $usuarios,
            ]);
        }
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

    /**
     * Deletes an existing RestriCalendar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionRestri(){
        $request = Yii::$app->request;
        $aula = $request->post('aula');
        //var_dump($request->post('aula'));
        //var_dump($aula);
        $fecha = substr($request->post('fecini'), 0, 10);
        $ini = substr($request->post('fecini'), 11);
        $fin = substr($request->post('fin'), 11);
        $user = Yii::$app->$user->identity->id;
        $instituto = Instituto::findOne($user)->ID;
        $rep = 1;
        $per = '2018';
        $restri = new RestriCalendar();
        $restri->ID_Aula = $aula;
        $restri->ID_Instituto_Recibe = $instituto;
        $restri->ID_Tipo_Repeticion = $rep;
        $restri->ID_User_Recibe = $user;
        $restri->Fecha_ini = $fecha;
        $restri->Hora_ini = $ini;
        $restri->Hora_fin = $fin;
        $restri->Periodo_Academico = $per;
        $restri->save();

        return $this->redirect(['index','id' =>$aula]);
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
