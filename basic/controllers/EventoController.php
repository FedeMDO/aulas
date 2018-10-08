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
            $filter_comis[]=$materia;       
            // foreach ($materia->comisions as $comi) {            
                
            //     $filter_comis[]=$comi;
            // }
        }

    }
    $events = EventoCalendar::find()->where(['ID_Aula' => $id])->all();
    $const= RestriCalendar::find()->where(['ID_Aula' => $id])->all();
    foreach ($const as $cons) {
         $event1 = new \yii2fullcalendar\Models\Event();
       
         $event1->id =Instituto::findOne($cons->ID_Instituto_Recibe)->NOMBRE;
         $comienzoString = $cons->Fecha_ini.'T'.$cons->Hora_ini;
         $finalString = $cons->Fecha_ini.'T'.$cons->Hora_fin;
        $event1->start =$comienzoString;
        $event1->end=$finalString;
        $event1->backgroundColor = Instituto::findOne($cons->ID_Instituto_Recibe)->COLOR_HEXA;
        $event1->rendering = 'background';
        $event1->start =$cons->Fecha_ini;
      
        $tasks[] = $event1;
     }
    foreach ($events as $eve) {
        $usuarioLogiado = Users::findOne(Yii::$app->user->identity->id)->idInstituto;
        $usuarioLogiadoColor = Instituto::findOne($usuarioLogiado)->COLOR_HEXA;
        $id_user= $eve->ID_User_Asigna;
        $usuario= Users::findOne($id_user)->idInstituto;
        $instituto= Instituto::findOne($usuario)->NOMBRE;
        $institutocolor= Instituto::findOne($usuario)->COLOR_HEXA;
        $comision=Comision::findOne($eve->ID_Comision);
        $materia=Materia::findOne($comision->ID_MATERIA)->NOMBRE;
        $event = new \yii2fullcalendar\Models\Event();
        $event->id=$eve->ID;
        $event->title=$materia;
        $event->backgroundColor=$institutocolor;
        $event->editable=true;
        if ($usuarioLogiadoColor != $institutocolor){
            $event->editable=false;
        }
        $comienzoString = (string)$eve->Fecha_ini.'T'.(string)$eve->Hora_ini;
         $finalString = (string)$eve->Fecha_ini.'T'.(string)$eve->Hora_fin;
        $event->start =$comienzoString;
        $event->end=$finalString;
        //$event->constraint=Instituto::findOne($usuario)->NOMBRE;
        $tasks[] = $event;
    }
    $comi = new Comision();
    return $this->render('index', [
      'events'=>$tasks,'filter'=> $filter_comis, 'comi' => $comi, 'id_aula'=>$id ,"color"=>$institutocolor2
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
    public function actionCreate($date,$date2)
    {   
        $aula1= Aula::findOne($date2)->NOMBRE;
        $nombreusuario=Yii::$app->user->identity->username;
      
        $model = new EventoCalendar();
        $model->Fecha_ini=$date;
        $model->ID_User_Asigna=Yii::$app->user->identity->id;
        
        $model->ID_Aula=$date2;
        $request=Yii::$app->request->post();
        
        $model->save();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','id' =>$date2]);
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

        $evento= EventoCalendar::findONe($request->post('id'));

        $evento->Fecha_ini = substr($request->post('fecini'),0,10);
        $evento->Hora_ini = substr($request->post('fecini'),11);
        $evento->Hora_fin = substr($request->post('fin'),11);

        $evento->save();
        echo $hora1; 
    }
    public function actionUpd2()
    {
        $request = Yii::$app->request;
       $date2=$request->post('date2');
        var_dump($request->post('date2'));
        var_dump($date2);
        $request = Yii::$app->request;
        $titulo=$request->post('titulo');
        $fecha=substr($request->post('fecini'),0,10);
        if(!$horaini=substr($request->post('fecini'),11)==null){
            $horaini=substr($request->post('fecini'),11);
            $horafin=substr($request->post('fin'),11);
            $hora1=$horaini;
            $hora2=$horafin;
        }
        else{
            $hora1= null;
            $hora2= null;
        }
        $evento= new EventoCalendar;
        $comision=Comision::findOne(['NOMBRE'=>$titulo])->ID;
        $evento->ID_User_Asigna=Yii::$app->user->identity->id;
        $evento->title=$titulo;
        $evento->ID_Comision=$comision;
        $evento->Fecha_ini=$fecha;
        $evento->Hora_ini=$hora1;
        $evento->Hora_fin=$hora2;
        $evento->save();
        echo $hora1;
       ; 
       return $this->redirect(['index','id' =>$date2]);
      
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
