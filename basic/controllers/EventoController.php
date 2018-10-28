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
use app\models\Aula;
use app\models\Carrera;
use app\models\CarreraMateria;
use yii\helpers\VarDumper;
use app\models\EventoCalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use DateTime;
use DatePeriod;
use DateInterval;

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
    public function actionIndex($id)
    {
    // $id_usuario=Yii::$app->user->identity->id;
    // $id_instituto=Instituto::findOne($id_usuario)->ID;
    // $id_carrera= Carrera::findOne($id_instituto)->ID;
    // $carrera_materia= CarreraMateria::findAll([
    //     'ID_CARRERA' => $id_carrera,
    // ]);
    
    // foreach ($carrera_materia as $cons) {
    //     $materias=Materia::findOne($cons->ID_MATERIA)->NOMBRE;
        
    //     $filter_mate[]=$materias;
    // }
    // REFACTORIZO Y CAPTO COMISIONES, NO NOMBRES

    //*esto es para cambiar el color de las materias en la vista
    $id_user= Yii::$app->user->identity->id;
    $usuario= Users::findOne($id_user)->idInstituto;
    $institutocolor2= Instituto::findOne($usuario)->COLOR_HEXA;

    ///
    $carreras = Users::findOne(Yii::$app->user->identity->id)->instituto->carreras;

    foreach ($carreras as $carrera) {
        foreach ($carrera->mATERIAs as $materia) {
            $filter_comis[] = $materia;
        }
    }
    $filterDistinct = array_unique($filter_comis, SORT_REGULAR);

    return $this->render('index', [
      'filter'=> $filterDistinct, 'id_aula'=>1 ,"color"=>"red"
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
    public function actionCreate($date,$id_aula)
    {   
        $aula1= Aula::findOne($id_aula)->NOMBRE;
        $nombreusuario=Yii::$app->user->identity->username;
      
        $model = new EventoCalendar();
        $model->Fecha_ini=$date;
        $model->ID_User_Asigna=Yii::$app->user->identity->id;
        
        $model->ID_Aula=$id_aula;
        $request=Yii::$app->request->post();
        
        $model->save();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','id' =>$id_aula]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,'aula1'=>$aula1,'nombreusuario'=>$nombreusuario,
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
    public function actionUpd()
    {
        $request = Yii::$app->request;
        $evento = $this->findModel($request->post('id'));

        $evento->Hora_ini = substr($request->post('ini'), -8);
        $evento->Hora_fin = substr($request->post('fin'), -8);
        if($evento->save())
        {
            echo("Actualizacion exitosa");
        }
    }
    public function actionUpd2()
    {
        $request = Yii::$app->request;

        $id_aula=$request->post('id_aula');

        $id=$request->post('id');
        $evento = $this->findModel($id);

        $ini = $request->post('ini');
        $fin = $request->post('ini');

        $evento->ID_User_Asigna=Yii::$app->user->identity->id;
        $evento->Hora_ini = substr($request->post('ini'), -8);
        $evento->Hora_fin = substr($request->post('fin'), -8);
        $evento->ID_Aula = $id_aula;
        if($evento->save())
        {
            echo("Actualizacion exitosa");
        }
       return $this->redirect(['index','id' =>$id_aula]);
      
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

    public function actionJsoncalendar($id, $start=NULL,$end=NULL,$_=NULL){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $tasks = array();

        //RESTRICCIONES
        $const= RestriCalendar::find()->where(['ID_Aula' => $id])->all();
        foreach ($const as $cons) {

            $dowArray = explode(',', $cons->dow);
            $begin = new DateTime($cons->ciclo->fecha_inicio);
            $end = new DateTime($cons->ciclo->fecha_fin);

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dia)
            {
                foreach($dowArray as $dow)
                {
                    if ($dia->format('N') == $dow)
                    {
                        $restri = new \yii2fullcalendar\Models\Event();
                        $restri->id = $cons->instituto->NOMBRE;
                        $restri->ranges = [array('start' => $cons->ciclo->fecha_inicio, 'end' => $cons->ciclo->fecha_fin)];
                        $restri->start = $dia->format('Y-m-d').'T'.$cons->Hora_ini;
                        $restri->end = $dia->format('Y-m-d').'T'.$cons->Hora_fin;
                        $restri->backgroundColor = $cons->instituto->COLOR_HEXA;
                        $restri->rendering = 'background';
                        $tasks[] = $restri;
                    }
                }
            }

            //EVENTOS
            $events = EventoCalendar::find()->where(['ID_Aula' => $id])->all();
            foreach ($events as $eve) {

                $instIdOnSessionUser = Users::findOne(Yii::$app->user->identity->id)->idInstituto;
                $institutocolor = $eve->instituto->COLOR_HEXA;
                $comision = $eve->comision;

                $dowArray = explode(',', $eve->dow);
                $begin = new DateTime($eve->ciclo->fecha_inicio);
                $end = new DateTime($eve->ciclo->fecha_fin);

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);

                foreach ($period as $dia)
                {
                    foreach($dowArray as $dow)
                    {
                        if ($dia->format('N') == $dow)
                        {
                            $event = new \yii2fullcalendar\Models\Event();
                            $event->id = $eve->id;
                            $event->title = $comision->getName();
                            $event->backgroundColor = $institutocolor;
                            $event->editable = true;
                            $event->constraint = $eve->instituto->NOMBRE;

                            $event->ranges = [array('start' => $eve->ciclo->fecha_inicio, 'end' => $eve->ciclo->fecha_fin)];
                            //user en session no edita eventos de otros institutos
                            if ($instIdOnSessionUser != $eve->instituto->ID)
                            {
                                $event->editable = false;
                            }
                            $event->start = $dia->format('Y-m-d').'T'.$eve->Hora_ini;
                            $event->end = $dia->format('Y-m-d').'T'.$eve->Hora_fin;
                            $tasks[] = $event;
                        }
                    }
                }
            }
        }
        return $tasks;
      }
}
