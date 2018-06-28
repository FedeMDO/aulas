<?php

namespace app\controllers;

use Yii;
use app\models\EventoCalendar;
use app\models\Users;
use app\models\Instituto;
use app\models\EventoCalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventoController implements the CRUD actions for EventoCalendar model.
 */
class EventoController extends Controller
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
     * Lists all EventoCalendar models.
     * @return mixed
     */
    public function actionIndex()
    {
    $events = EventoCalendar::find()->all();
    //    $const= RestriCalendar::find()->all();
    //    foreach ($const as $cons) {
    //     $event1 = new \yii2fullcalendar\Models\Event();
    //     $event1->id = $cons->id;
    //     $event1->start =$cons->fecini;
    //     $event1->rendering='background';
    //     $event1->color='#ff9f89';
    //     $tasks[] = $event1;
    // }
    foreach ($events as $eve) {

        $id_user= $eve->ID_User_Asigna;
        $usuario= Users::findOne($id_user)->idInstituto;
        $instituto= Instituto::findOne($usuario)->NOMBRE; 
        $event = new \yii2fullcalendar\Models\Event();
        $event->title= $instituto;
        $event->start=$eve->Fecha_ini;
    
        // $event->id = $eve->id;
        // $event->title =$eve->nombre;
        // $event->start =$eve->fecini;
        
        $tasks[] = $event;
    }
    // $event = new \yii2fullcalendar\Models\Event();
    
    //     $event->id =1;
    //     $event->title ="nicolas";
    //     $event->start ='2018-06-24';
        
    //     $tasks[] = $event;


    return $this->render('index', [
      'events'=>$tasks,
    ]);
}

    /**
     * Displays a single EventoCalendar model.
     * @param integer $id
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
     * Creates a new EventoCalendar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EventoCalendar();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EventoCalendar model.
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
     * Deletes an existing EventoCalendar model.
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
     * Finds the EventoCalendar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EventoCalendar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EventoCalendar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
