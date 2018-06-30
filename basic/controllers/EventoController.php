<?php

namespace app\controllers;

use Yii;
use app\models\EventoCalendar;
use app\models\RestriCalendar;

use app\models\Users;
use app\models\Instituto;
use app\models\Comision;
use app\models\Materia;
use app\models\Hora;

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
    $const= RestriCalendar::find()->all();
    foreach ($const as $cons) {
         $event1 = new \yii2fullcalendar\Models\Event();
       
         $event1->id =Instituto::findOne($cons->ID_Instituto_Recibe)->NOMBRE;
      
         $event1->start =$cons->Fecha_ini;
         $event1->end=$cons->Fecha_fin;
         $event1->rendering='background';
        $event1->color=Instituto::findOne($cons->ID_Instituto_Recibe)->COLOR_HEXA;;
         $tasks[] = $event1;
     }
    foreach ($events as $eve) {

        $id_user= $eve->ID_User_Asigna;
        $usuario= Users::findOne($id_user)->idInstituto;
        $instituto= Instituto::findOne($usuario)->NOMBRE; 
        $comision=Comision::findOne($eve->ID_Comision);
        $materia=Materia::findOne($comision->ID_MATERIA)->NOMBRE;
       
        $event = new \yii2fullcalendar\Models\Event();
        $event->title=$materia;
        $event->start=$eve->Fecha_ini.'T'.Hora::FindOne($eve->Hora_ini)->HORA;
        $event->end=$eve->Fecha_ini.'T'.Hora::FindOne($eve->Hora_fin)->HORA;
        $event->constraint=Instituto::findOne($usuario)->NOMBRE;
        $tasks[] = $event;
    }
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
    public function actionCreate($date)
    {
        $model = new EventoCalendar();
        $model->Fecha_ini=$date;
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
