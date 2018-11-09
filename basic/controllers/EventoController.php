<?php

namespace app\controllers;

use Yii;
use app\models\EventoCalendar;
use app\models\RestriCalendar;
use app\models\Sede;
use app\models\Comision;
use app\models\Carrera;
use app\models\Users;
use app\models\Instituto;
use app\models\Materia;
use app\models\Hora;
use yii\bootstrap\Modal;
use app\models\Aula;
use app\models\CarreraMateria;
use yii\helpers\VarDumper;
use yii\helpers\Url;
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
        return $this->render('index', [
        'id_aula'=>$id 
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
    public function actionCreate($id_aula)
    {
        $materia = new Materia();
        $carrera = new Carrera();
        $model = new EventoCalendar();
        $model->ID_User_Asigna=Yii::$app->user->identity->id;
        //ESTA MAL, BUSCAR ID DE INSTITUTO POR COMISION ASIGNADA, NO POR USER QUE ASIGNA.
        

        if ($model->load(Yii::$app->request->post())) {
            $institutoID = $model->comision->mATERIA->carrera->iNSTITUTO->ID;
            $ciclo = $model->comision->ID_Ciclo;
            $model->ID_Instituto = $institutoID;
            $model->ID_Ciclo = $ciclo;
            $model->ID_Aula = $id_aula;
            if($model->save())
            {
                return $this->redirect(['index','id' =>$model->ID_Aula]);
            }
            else
            {
                return $this->renderAjax('create', [ 'model' => $model , 'materia' => $materia, 'carrera' => $carrera]);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model, 'materia' => $materia, 'carrera' => $carrera,
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

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }
    public function actionUpd()
    {
        $request = Yii::$app->request;
        $evento = $this->findModel($request->post('id'));
        $evento ->dow = $request->post('dow');
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
        $evento = $this->findModel($request->post('id'));

        $ini = $request->post('ini');
        $fin = $request->post('ini');

        $evento->ID_User_Asigna=Yii::$app->user->identity->id;
        $evento->Hora_ini = substr($request->post('ini'), -8);
        $evento->Hora_fin = substr($request->post('fin'), -8);
        $evento->ID_Aula = $request->post('id_aula');
        if($evento->save())
        {
            echo("Actualizacion exitosa");
        }
       return $this->redirect(['index','id_aula' =>$id_aula]);
      
    }
    public function actionUpdscheduler()
    {
        $request = Yii::$app->request;
        $evento = $this->findModel($request->post('id'));

        $evento->Hora_ini = substr($request->post('ini'), -8);
        $evento->Hora_fin = substr($request->post('fin'), -8);
        $evento->ID_Aula = $request->post('aula_id');
        if($evento->save())
        {
            echo("Actualizacion exitosa");
        }
    }

    /**
     * Deletes an existing EventoCalendar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $request = Yii::$app->request;
        $this->findModel($request->post('id'))->delete();
        $id_aula =  $request->post('id_aula');
        return $this->redirect(['index','id' =>$id_aula]);
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
    public function actionJsonresources($id_sede, $start=NULL,$end=NULL,$_=NULL){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $resources = array();
        $sede = Sede::findOne($id_sede);
        $aulas = array();
        if(!empty($sede->edificios)){
            foreach($sede->edificios as $edi)
            {
                if(!empty($edi->aulas))
                {
                    foreach($edi->aulas as $aula)
                    {
                        $aulas [] = $aula;
                    }
                }

            }
        }
        if(!empty($aulas))
        {
            foreach ($aulas as $aula)
            {
                $resource = array();

                $arrayRecu = array();
                foreach($aula->rECURSOs as $recu)
                {
                    $arrayRecu [] = '-'.$recu->NOMBRE;
                    
                }
                if(!empty($arrayRecu))
                {
                    $recursosAula = implode("\n", $arrayRecu);
                    $resource['recursos'] = $recursosAula;
                }
                else{
                    $resource['recursos'] = '-';
                }
                $resource['id'] = $aula->ID;
                $resource['title'] = $aula->NOMBRE;
                $resource['edificio'] = $aula->eDIFICIO->NOMBRE;
                $resource['url'] = URL::toRoute('evento/index?id=').$aula->ID;
                $obj = (object) $resource;

                $resources [] = $obj;
            }
        }

        return $resources;
    }
    public function actionJsoncalendar($id=NULL, $start=NULL,$end=NULL,$_=NULL){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $instIdOnSessionUser = Users::findOne(Yii::$app->user->identity->id)->idInstituto;
        $aula = Aula::findOne($id);
        //RESTRICCIONES
        foreach ($aula->restriCalendars as $cons) 
        {
                
            $begin = new DateTime($cons->ciclo->fecha_inicio);
            $end = new DateTime($cons->ciclo->fecha_fin);

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);
            
            foreach ($period as $dia)
            {
                if ($dia->format('N') ==  $cons->dow)
                {

                    $restri = array();
                    $restri['id'] = intval($cons->id).'R';
                    $restri['title'] = $cons->instituto->ID;
                    $restri['ranges'] = [array('start' => $cons->ciclo->fecha_inicio, 'end' => $cons->ciclo->fecha_fin)];
                    $restri['start'] = $dia->format('Y-m-d').'T'.$cons->Hora_ini;
                    $restri['end'] = $dia->format('Y-m-d').'T'.$cons->Hora_fin;
                    $restri['backgroundColor'] = $cons->instituto->COLOR_HEXA;
                    $restri['rendering'] = 'background';
                    $restri['resourceId'] = $cons->ID_Aula;
                    $restri['usermodifico'] = $cons->ID_User_Asigna;
                    if ($instIdOnSessionUser != $cons->instituto->ID)
                        {
                            $restri['overlap'] = false;
                        }
                    $tasks[] = (object) $restri;
                }
            }
        }
        //EVENTOS
        foreach ($aula->eventoCalendars as $eve) 
        {
            $begin = new DateTime($eve->ciclo->fecha_inicio);
            $end = new DateTime($eve->ciclo->fecha_fin);

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dia)
            {
                if ($dia->format('N') == $eve->dow)
                {
                    $event = array();
                        
                    $event['id'] = intval($eve->id).'E';
                    $event['title'] = $eve->comision->getName();
                    $event['color'] = $eve->instituto->COLOR_HEXA;                             
                    $event['ranges'] = [array('start' => $eve->ciclo->fecha_inicio, 'end' => $eve->ciclo->fecha_fin)];
                    $event['editable'] = true;
                    //user en session no edita eventos de otros institutos
                    if ($instIdOnSessionUser != $eve->instituto->ID)
                    {
                        $event['editable'] = false;
                    }
                    $event['start'] = $dia->format('Y-m-d').'T'.$eve->Hora_ini;
                    $event['end'] = $dia->format('Y-m-d').'T'.$eve->Hora_fin;
                    $event['usermodifico'] = $eve->ID_User_Asigna;
                    $event['resourceId'] = $eve->ID_Aula;
                    $tasks[] = (object) $event;
                }
            }
        }
        return $tasks;
      }

    public function actionJsonschedulersede($id_sede, $start,$end=NULL,$_=NULL){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $instIdOnSessionUser = Users::findOne(Yii::$app->user->identity->id)->idInstituto;
        $tasks = array();
        $sede = Sede::findOne($id_sede);
        $aulas = array();
        if(!empty($sede->edificios))
        {
            foreach($sede->edificios as $edi)
            {
                
                if(!empty($edi->aulas))
                {
                    foreach($edi->aulas as $aula)
                    {                        
                        //RESTRICCIONES
                        foreach ($aula->restriCalendars as $cons) 
                        {
                            $begin = new DateTime($cons->ciclo->fecha_inicio);
                            $end = new DateTime($cons->ciclo->fecha_fin);

                            $interval = DateInterval::createFromDateString('1 day');
                            $period = new DatePeriod($begin, $interval, $end);

                            foreach ($period as $dia)
                            {
                                if ($dia->format('N') == intval($cons->dow))
                                {
                                    $restri = array();
                                    $restri['id'] = intval($cons->id).'R';
                                    $restri['title'] = $cons->instituto->ID;
                                    $restri['ranges'] = [array('start' => $cons->ciclo->fecha_inicio, 'end' => $cons->ciclo->fecha_fin)];
                                    $restri['start'] = $dia->format('Y-m-d').'T'.$cons->Hora_ini;
                                    $restri['end'] = $dia->format('Y-m-d').'T'.$cons->Hora_fin;
                                    $restri['backgroundColor'] = $cons->instituto->COLOR_HEXA;
                                    $restri['rendering'] = 'background';
                                    $restri['resourceId'] = $cons->ID_Aula;
                                    if ($instIdOnSessionUser != $cons->instituto->ID)
                                        {
                                            $restri['overlap'] = false;
                                        }
                                    $tasks[] = (object) $restri;
                                }
                            }
                        }
                        //EVENTOS
                        foreach ($aula->eventoCalendars as $eve) 
                        {
                            $begin = new DateTime($eve->ciclo->fecha_inicio);
                            $end = new DateTime($eve->ciclo->fecha_fin);
                            $interval = DateInterval::createFromDateString('1 day');
                            $period = new DatePeriod($begin, $interval, $end);

                            foreach ($period as $dia)
                            {
                                if ($dia->format('N') == intval($eve->dow))
                                {
                                    $event = array();
                                    
                                    $event['id'] = intval($eve->id).'E';
                                    $event['title'] = $eve->comision->getName();
                                    $event['color'] = $eve->instituto->COLOR_HEXA;                             
                                    $event['ranges'] = [array('start' => $eve->ciclo->fecha_inicio, 'end' => $eve->ciclo->fecha_fin)];
                                    $event['editable'] = true;
                                    //user en session no edita eventos de otros institutos
                                    if ($instIdOnSessionUser != $eve->instituto->ID)
                                    {
                                        $event['editable'] = false;
                                    }
                                    $event['start'] = $dia->format('Y-m-d').'T'.$eve->Hora_ini;
                                    $event['end'] = $dia->format('Y-m-d').'T'.$eve->Hora_fin;
                                    $event['resourceId'] = $eve->ID_Aula;
                                    
                                    $tasks[] = (object) $event;
                                }
                            }
                        }
                    }
                }
            }
        }
        // var_dump($x);
        return $tasks;
    }
    public function actionListcarrera($id)
    {
        $carreras = Carrera::find()
            ->where(['ID_INSTITUTO' => $id])
            ->orderBy('id DESC')
            ->all();

        if (!empty($carreras)) {
            foreach($carreras as $carrera) {
                echo "<option value='".$carrera->ID."'>".$carrera->NOMBRE."</option>";
            }
        } else {
            echo "<option>-</option>";
        }

    }
    public function actionListmateria($id)
    {
        $materias = Carrera::findone($id)->materias;

        if (!empty($materias)) {
            foreach($materias as $materia) {
                echo "<option value='".$materia->ID."'>".$materia->NOMBRE." (".$materia->COD_MATERIA.")</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }
    public function actionListcomision($id)
    {
        $materia = Materia::findOne($id);
        $comisiones = $materia->comisions;

        if (!empty($comisiones)) {
            foreach($comisiones as $comision) {
                echo "<option value='".$comision->ID."'>".$materia->DESC_CORTA.$comision->NUMERO."</option>";
            }
        } else {
            echo "<option>-</option>";
        }

    }
}
