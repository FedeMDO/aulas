<?php

namespace app\controllers;

use Yii;
use app\models\RestriCalendar;
use app\models\RestriCalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\EventoCalendar;

use app\models\Users;
use app\models\Instituto;
use app\models\Comision;
use app\models\Materia;
use app\models\Hora;

/**
 * RestriccionController implements the CRUD actions for RestriCalendar model.
 */
class RestriccionController extends Controller
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
    public function actionIndex()
    {
    $events= RestriCalendar::find()->all();
    foreach ($events as $eve) {
        $instituto= Instituto::findOne($eve->ID_Instituto_Recibe)->NOMBRE;        
        $event = new \yii2fullcalendar\Models\Event();
        $event->title=$instituto;
        $event->start=$eve->Fecha_ini.'T'.Hora::FindOne($eve->Hora_ini)->HORA;
        $event->end=$eve->Fecha_ini.'T'.Hora::FindOne($eve->Hora_fin)->HORA;
        $event->backgroundColor=Instituto::findOne($eve->ID_Instituto_Recibe)->COLOR_HEXA;
        $tasks[] = $event;
    }
    return $this->render('index', [
      'events'=>$tasks,
    ]);
}

    /**
     * Creates a new RestriCalendar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date)
    {
        $model = new RestriCalendar();
        $model->Fecha_ini=$date;
        $model->ID_User_Recibe=Yii::$app->user->identity->id;
        $model->ID_Instituto_Recibe=Instituto::findOne($model->ID_User_Recibe)->ID;
        $request=Yii::$app->request->post();
        $model->save();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
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
