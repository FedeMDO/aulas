<?php

namespace app\controllers;

use Yii;
use app\models\EventoCalendar;
use app\models\RestriCalendar;
use app\models\Sede;
use app\models\Comision;
use app\models\Carrera;
use app\models\Users;
use app\models\Actividad;
use app\models\User;
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
use yii\data\Pagination;
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
        $aula = Aula::findOne($id);
        $actividades = Actividad::find()->where(['ID_AULA' => $id]);
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $actividades->count(),
        ]);

        $act = $actividades->orderBy(['MOMENTO' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index', [
            'id_aula' => $id,
            'aula' => $aula,
            'actividades' => $act
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
    public function actionCreate($id_aula, $sch = "false")
    {
        $materia = new Materia();
        $carrera = new Carrera();
        $instituto = new Instituto();
        $actividad = new Actividad();
        $model = new EventoCalendar();
        $model->ID_User_Asigna = Yii::$app->user->identity->id;
        $model->ID_UModifica = Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post())) {
            $institutoID = $model->comision->mATERIA->carrera->iNSTITUTO->ID;
            $ciclo = $model->comision->ID_Ciclo;
            $model->ID_Instituto = $institutoID;
            $model->ID_Ciclo = $ciclo;
            $model->ID_Aula = $id_aula;
            //guardo registro de la actividad
            $request = $_POST['EventoCalendar'];
            $ini = $request["Hora_ini"];
            $fin = $request["Hora_fin"];
            $dow = $request["dow"];
            $dias_semana = [1 => "lunes", 2 => "martes", 3 => "miércoles", 4 => "jueves", 5 => "viernes", 6 => "sabado"];
            $actividad->ID_USUARIO = Yii::$app->user->identity->id;
            $actividad->ACCION = "creó el evento ".$model->comision->mATERIA->NOMBRE." comisión ".$model->comision->NUMERO." el ".$dias_semana[$dow]." de ".substr($ini, 0, 2)." a ".substr($fin,0,2)." hs";
            $actividad->USER_REALIZA = Yii::$app->user->identity->username;
            $actividad->ID_AULA = $id_aula;
            $actividad->save();
            if ($model->save()) {
                if($sch === "false")
                {
                    return $this->redirect(['index', 'id' => $model->ID_Aula]);
                }
                else
                {
                    return $this->redirect(['edificio/scheduler', 'id_sede' => $model->aula->eDIFICIO->sEDE->ID]);
                }
            } else {
                return $this->renderAjax('create', ['model' => $model, 'materia' => $materia, 'carrera' => $carrera, 'instituto' => $instituto, ]);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model, 'materia' => $materia, 'carrera' => $carrera, 'instituto' => $instituto,
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
        $dias_semana = [1 => "lunes", 2 => "martes", 3 => "miércoles", 4 => "jueves", 5 => "viernes", 6 => "sabado"];
        $evento = $this->findModel($request->post('id'));
        $evento->dow = $request->post('dow');
        $evento->Hora_ini = substr($request->post('ini'), -8);
        $evento->Hora_fin = substr($request->post('fin'), -8);
        $evento->ID_UModifica = Yii::$app->user->identity->id;
        $actividad = new Actividad();
        $actividad->ACCION = "modificó el evento ".$evento->comision->mATERIA->NOMBRE." comisión ".$evento->comision->NUMERO.". Ahora  es el ".$dias_semana[$evento->dow]." de ".substr($evento->Hora_ini, 0, 2)." a ".substr($evento->Hora_fin,0,2)." hs";
        $actividad->ID_USUARIO = $evento->ID_UModifica;
        $actividad->USER_REALIZA = Yii::$app->user->identity->username;
        $actividad->ID_AULA = $evento->ID_Aula;
        $actividad->save();
        if ($evento->save()) {
            echo ("Actualizacion exitosa");
        }
    }

    public function actionUpdscheduler()
    {
        $request = Yii::$app->request;
        $evento = $this->findModel($request->post('id'));

        $evento->Hora_ini = substr($request->post('ini'), -8);
        $evento->Hora_fin = substr($request->post('fin'), -8);
        $evento->ID_Aula = $request->post('aula_id');
        $evento->dow = $request->post('dow');
        $evento->ID_User_Asigna = Yii::$app->user->identity->id;
        if ($evento->save()) {
            echo ("Actualizacion exitosa");
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
        $evento = $this->findModel($request->post('id'));
        $dias_semana = [1 => "lunes", 2 => "martes", 3 => "miércoles", 4 => "jueves", 5 => "viernes", 6 => "sabado"];
        $dow = $evento->dow;
        $ini = $evento->Hora_ini;
        $fin = $evento->Hora_fin;
        $actividad = new Actividad();
        $actividad->ACCION = "borró el evento ".$evento->comision->mATERIA->NOMBRE." comisión ".$evento->comision->NUMERO." el ".$dias_semana[$dow]." de ".substr($ini, 0, 2)." a ".substr($fin,0,2)." hs";
        $actividad->ID_USUARIO = Yii::$app->user->identity->id;
        $actividad->USER_REALIZA = Yii::$app->user->identity->username;
        $actividad->ID_AULA = $evento->ID_Aula;
        $actividad->save();
        $evento->delete();
        $id_aula = $request->post('id_aula');
        if ($request->post('scheduler') == 1) {
            $id_sede = $request->post('id_sede');
            return $this->redirect(['edificio/scheduler', 'id_sede' => $id_sede]);
        }
        return $this->redirect(['index', 'id' => $id_aula]);
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
                $n = 0;
                foreach ($aula->rECURSOs as $recu) {
                    $n = $n + 1;
                    if (count($aula->rECURSOs) == $n) {
                        $arrayRecu[] = $recu->NOMBRE;
                    } else {
                        $arrayRecu[] = $recu->NOMBRE . ' -';
                    }
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
                $resource['capacidad'] = $aula->CAPACIDAD;
                $resource['url'] = URL::toRoute('evento/index?id=') . $aula->ID;
                $obj = (object)$resource;
                $resources[] = $obj;
            }
        }

        return $resources;
    }
    public function actionJsoncalendar($id = null, $start = null, $end = null, $_ = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        //Ciclo en sesion
        $cicloSessID = Yii::$app->session->get('cicloID');

        $isGuest = User::isUserGuest(Yii::$app->user->identity->id);
        $isAdmin = User::isUserAdmin(Yii::$app->user->identity->id);
        if (!$isGuest) {
            $instIdOnSessionUser = Users::findOne(Yii::$app->user->identity->id)->idInstituto;
        }
        $tasks = array();
        $aula = Aula::findOne($id);
        //RESTRICCIONES
        foreach ($aula->restriCalendars as $cons) {

            //CHECKEO CICLO EN SESION
            if ($cons->ID_Ciclo == $cicloSessID) {
                $begin = new DateTime($cons->ciclo->fecha_inicio);
                $endItrvl = new DateTime($cons->ciclo->fecha_fin);

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $endItrvl);

                foreach ($period as $dia) {
                    if ($dia->format('N') == $cons->dow) {

                        $restri = array();
                        $restri['id'] = intval($cons->id) . 'R';
                        $restri['title'] = $cons->instituto->ID;
                        $restri['ranges'] = [array('start' => $cons->ciclo->fecha_inicio, 'end' => $cons->ciclo->fecha_fin)];
                        $restri['start'] = $dia->format('Y-m-d') . 'T' . $cons->Hora_ini;
                        $restri['end'] = $dia->format('Y-m-d') . 'T' . $cons->Hora_fin;
                        $restri['backgroundColor'] = $cons->instituto->COLOR_HEXA;
                        $restri['rendering'] = 'background';
                        $restri['resourceId'] = $cons->ID_Aula;
                        $restri['ajeno'] = false;
                        $restri['usermodifico'] = $cons->ID_User_Asigna;
                        if ($isGuest) {
                            $restri['ajeno'] = true;
                            $restri['overlap'] = false;
                        } else if ($instIdOnSessionUser != $cons->instituto->ID) {
                            $restri['ajeno'] = true;
                            $restri['overlap'] = false;
                        }
                        if ($isAdmin) {
                            $restri['ajeno'] = false;
                            $restri['overlap'] = true;
                        }
                        $tasks[] = (object)$restri;
                    }
                }
            }

        }
        //EVENTOS
        foreach ($aula->eventoCalendars as $eve) {
            //CHECKEO CICLO EN SESION
            if ($eve->ID_Ciclo == $cicloSessID) {
                $begin = new DateTime($eve->ciclo->fecha_inicio);
                $endItrvl = new DateTime($eve->ciclo->fecha_fin);

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $endItrvl);

                foreach ($period as $dia) {
                    if ($dia->format('N') == $eve->dow) {
                        $event = array();
                    // Evento NO ESPECIAL (es periodico).
                        $event['especial'] = false;
                        $event['id'] = intval($eve->id) . 'E';
                        $event['title'] = $eve->comision->getName();
                        $event['color'] = $eve->instituto->COLOR_HEXA;
                        $event['ranges'] = [array('start' => $eve->ciclo->fecha_inicio, 'end' => $eve->ciclo->fecha_fin)];
                        $event['editable'] = true;
                        $event['ajeno'] = false;
                        if ($isGuest) {
                            $event['ajeno'] = true;
                            $event['editable'] = false;
                        }
                    //user en session no edita eventos de otros institutos
                        else if ($instIdOnSessionUser != $eve->instituto->ID) {
                            $event['ajeno'] = true;
                            $event['editable'] = false;
                        }
                        if ($isAdmin) {
                            $event['ajeno'] = false;
                            $event['editable'] = true;
                        }
                        $event['start'] = $dia->format('Y-m-d') . 'T' . $eve->Hora_ini;
                        $event['end'] = $dia->format('Y-m-d') . 'T' . $eve->Hora_fin;
                        $event['usermodifico'] = $eve->ID_UModifica;
                        $event['resourceId'] = $eve->ID_Aula;
                        $tasks[] = (object)$event;
                    }
                }
            }
        }
        return $tasks;
    }

    public function actionJsonschedulersede($id_sede, $start = null, $end = null, $_ = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        //Ciclo en sesion
        $cicloSessID = Yii::$app->session->get('cicloID');

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
                        //RESTRICCIONES
                        foreach ($aula->restriCalendars as $cons) {
                            //CICLO EN SESION
                            if ($cons->ID_Ciclo == $cicloSessID) {
                                $begin = new DateTime($cons->ciclo->fecha_inicio);
                                $endItrvl = new DateTime($cons->ciclo->fecha_fin);

                                $interval = DateInterval::createFromDateString('1 day');
                                $period = new DatePeriod($begin, $interval, $endItrvl);

                                foreach ($period as $dia) {
                                    if ($dia->format('N') == intval($cons->dow)) {
                                        $restri = array();
                                        $restri['id'] = intval($cons->id) . 'R';
                                        $restri['title'] = $cons->instituto->ID;
                                        $restri['ranges'] = [array('start' => $cons->ciclo->fecha_inicio, 'end' => $cons->ciclo->fecha_fin)];
                                        $restri['start'] = $dia->format('Y-m-d') . 'T' . $cons->Hora_ini;
                                        $restri['end'] = $dia->format('Y-m-d') . 'T' . $cons->Hora_fin;
                                        $restri['backgroundColor'] = $cons->instituto->COLOR_HEXA;
                                        $restri['rendering'] = 'background';
                                        $restri['usermodifico'] = $cons->ID_User_Asigna;
                                        $restri['ajeno'] = false;
                                        $restri['resourceId'] = $cons->ID_Aula;
                                        if ($isGuest) {
                                            $restri['ajeno'] = true;
                                            $restri['overlap'] = false;
                                        } else if ($instIdOnSessionUser != $cons->instituto->ID) {
                                            $restri['ajeno'] = true;
                                            $restri['overlap'] = false;
                                        }
                                        if ($isAdmin) {
                                            $restri['ajeno'] = false;
                                            $restri['overlap'] = true;
                                        }
                                        if (User::isUserGuest(Yii::$app->user->identity->id)) {
                                            $restri['ajeno'] = true;
                                            $restri['overlap'] = false;
                                        }
                                        $tasks[] = (object)$restri;
                                    }
                                }
                            }
                        }
                        //EVENTOS
                        foreach ($aula->eventoCalendars as $eve) {
                            //CICLO EN SESION
                            if ($eve->ID_Ciclo == $cicloSessID) {
                                $begin = new DateTime($eve->ciclo->fecha_inicio);
                                $endItrvl = new DateTime($eve->ciclo->fecha_fin);
                                $interval = DateInterval::createFromDateString('1 day');
                                $period = new DatePeriod($begin, $interval, $end);

                                foreach ($period as $dia) {
                                    if ($dia->format('N') == intval($eve->dow)) {
                                        $event = array();
                                    // Evento NO ESPECIAL (es periodico).
                                        $event['especial'] = false;
                                        $event['id'] = intval($eve->id) . 'E';
                                        $event['title'] = $eve->comision->getName();
                                        $event['color'] = $eve->instituto->COLOR_HEXA;
                                        $event['ranges'] = [array('start' => $eve->ciclo->fecha_inicio, 'end' => $eve->ciclo->fecha_fin)];
                                        $event['editable'] = true;
                                        $event['ajeno'] = false;
                                    //user en session no edita eventos de otros institutos
                                        if ($isGuest) {
                                            $event['ajeno'] = true;
                                            $event['editable'] = false;
                                        } else if ($instIdOnSessionUser != $eve->instituto->ID) {
                                            $event['ajeno'] = true;
                                            $event['editable'] = false;
                                        }
                                        if ($isAdmin) {
                                            $event['ajeno'] = false;
                                            $event['editable'] = true;
                                        }
                                        $event['start'] = $dia->format('Y-m-d') . 'T' . $eve->Hora_ini;
                                        $event['end'] = $dia->format('Y-m-d') . 'T' . $eve->Hora_fin;
                                        $event['resourceId'] = $eve->ID_Aula;
                                        $event['usermodifico'] = $eve->ID_UModifica;
                                        $tasks[] = (object)$event;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $tasks;
    }
    public function actionListcarrera($id)
    {
        $carreras = Carrera::find()
            ->where(['ID_INSTITUTO' => $id])
            ->orderBy('id DESC')
            ->all();

        if (!empty($carreras)) {
            foreach ($carreras as $carrera) {
                echo "<option value='" . $carrera->ID . "'>" . $carrera->NOMBRE . "</option>";
            }
        } else {
            echo "<option>-</option>";
        }

    }
    public function actionListmateria($id)
    {
        $materias = Carrera::findone($id)->materias;

        if (!empty($materias)) {
            foreach ($materias as $materia) {
                echo "<option value='" . $materia->ID . "'>" . $materia->NOMBRE . " (" . $materia->COD_MATERIA . ")</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }
    public function actionListcomision($id)
    {
        $vacio = true;
        //Ciclo en sesion
        $cicloSessID = Yii::$app->session->get('cicloID');
        $materia = Materia::findOne($id);
        $comisiones = $materia->comisions;
        if (!empty($comisiones)) {
            foreach ($comisiones as $comision) {
                //CHECKEO CICLO EN SESION
                if ($comision->ID_Ciclo == $cicloSessID) {
                    $vacio = false;
                    echo "<option value='" . $comision->ID . "'>" . $materia->DESC_CORTA . $comision->NUMERO . "</option>";
                }
            }
        } else {
            echo "<option>-</option>";
        }
        if($vacio){
            echo "<option>-</option>";
        }
    }
}
