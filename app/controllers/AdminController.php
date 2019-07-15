<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\FormRegister;
use app\models\Users;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\User;
use yii\data\Pagination;
use app\models\Notificacion;
use yii\base\Exception;
use app\models\Instituto;
use app\models\Aula;
use app\models\EventoCalendar;
use app\models\EspecialCalendar;
use app\models\CicloLectivo;


class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        //Los usuarios simples tienen permisos sobre las siguientes acciones
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
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
        ];
    }

    public function actionPanel()
    {
        $this->layout = 'LayoutAdmin';
        return $this->render('panel');
    }
    public function actionReportes()
    {
        //Ciclo en Sesion
        $cicloSessID = Yii::$app->session->get('cicloID');
        $cicloSess = CicloLectivo::findOne($cicloSessID);

         // REPORTE USO DEL ESPACIO POR DIA
        $eventos = EventoCalendar::find()->where(['ID_Ciclo' => $cicloSessID])->all();

        $comisiones = array(
            "Lunes" => 0,
            "Martes" => 0,
            "Miercoles" => 0,
            "Jueves" => 0,
            "Viernes" => 0,
            "Sabado" => 0,
        );

        foreach ($eventos as $evento) {
            // aca preguntar por ciclo en sesion.
            switch ($evento->dow) {
                case 1:
                    $hora_fin_int = intval(substr($evento->Hora_fin, 0, 2));
                    $hora_ini_int = intval(substr($evento->Hora_ini, 0, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $comisiones["Lunes"] += $res;
                    break;
                case 2:
                    $hora_fin_int = intval(substr($evento->Hora_fin, 0, 2));
                    $hora_ini_int = intval(substr($evento->Hora_ini, 0, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $comisiones["Martes"] += $res;
                    break;
                case 3:
                    $hora_fin_int = intval(substr($evento->Hora_fin, 0, 2));
                    $hora_ini_int = intval(substr($evento->Hora_ini, 0, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $comisiones["Miercoles"] += $res;
                    break;
                case 4:
                    $hora_fin_int = intval(substr($evento->Hora_fin, 0, 2));
                    $hora_ini_int = intval(substr($evento->Hora_ini, 0, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $comisiones["Jueves"] += $res;
                    break;
                case 5:
                    $hora_fin_int = intval(substr($evento->Hora_fin, 0, 2));
                    $hora_ini_int = intval(substr($evento->Hora_ini, 0, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $comisiones["Viernes"] += $res;
                    break;
                case 6:
                    $hora_fin_int = intval(substr($evento->Hora_fin, 0, 2));
                    $hora_ini_int = intval(substr($evento->Hora_ini, 0, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $comisiones["Sabado"] += $res;
                    break;
            }
        }
        $evesespes = EspecialCalendar::find()->all();

        $especiales = array(
            "Lunes" => 0,
            "Martes" => 0,
            "Miercoles" => 0,
            "Jueves" => 0,
            "Viernes" => 0,
            "Sabado" => 0,
        );

        foreach ($evesespes as $espe) {
            $dow = date('w', strtotime(substr($espe->inicio, 0, 10)));
            // aca preguntar por ciclo en sesion.
            switch ($dow) {
                case 1:
                    $hora_fin_int = intval(substr($espe->fin, 11, 2));
                    $hora_ini_int = intval(substr($espe->inicio, 11, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $especiales["Lunes"] += $res;
                    break;
                case 2:
                    $hora_fin_int = intval(substr($espe->fin, 11, 2));
                    $hora_ini_int = intval(substr($espe->inicio, 11, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $especiales["Martes"] += $res;
                    break;
                case 3:
                    $hora_fin_int = intval(substr($espe->fin, 11, 2));
                    $hora_ini_int = intval(substr($espe->inicio, 11, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $especiales["Miercoles"] += $res;
                    break;
                case 4:
                    $hora_fin_int = intval(substr($espe->fin, 11, 2));
                    $hora_ini_int = intval(substr($espe->inicio, 11, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $especiales["Jueves"] += $res;
                    break;
                case 5:
                    $hora_fin_int = intval(substr($espe->fin, 11, 2));
                    $hora_ini_int = intval(substr($espe->inicio, 11, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $especiales["Viernes"] += $res;
                    break;
                case 6:
                    $hora_fin_int = intval(substr($espe->fin, 11, 2));
                    $hora_ini_int = intval(substr($espe->inicio, 11, 2));
                    $res = $hora_fin_int - $hora_ini_int;
                    $especiales["Sabado"] += $res;
                    break;
            }
        }
        

        // REPORTE PORCENTAJE TOTAL POR INSTITUTO
        $porcentajePorInstitutoComision = array();
        $porcentajePorInstitutoEspecial = array();
        $institutos = Instituto::find()->all();

        if (sizeof($institutos) > 0) {
            // template result
            foreach ($institutos as $instituto) {
                $eachComis = array(
                    'name' => $instituto->NOMBRE,
                    'y' => 0,
                    'color' => $instituto->COLOR_HEXA
                );
                foreach ($eventos as $eve) {
                    if ($eve->comision->mATERIA->carrera->iNSTITUTO->ID == $instituto->ID) {
                        $hora_fin_int = intval(substr($eve->Hora_fin, 0, 2));
                        $hora_ini_int = intval(substr($eve->Hora_ini, 0, 2));
                        $eachComis['y'] += $hora_fin_int - $hora_ini_int;
                    }
                }
                $porcentajePorInstitutoComision[] = $eachComis;

                $eachEspes = array(
                    'name' => $instituto->NOMBRE,
                    'y' => 0,
                    'color' => $instituto->COLOR_HEXA
                );
                foreach ($evesespes as $evEspe) {
                    if ($evEspe->ID_Carrera != null && $evEspe->carrera->iNSTITUTO->ID == $instituto->ID) {
                        $hora_fin_int = intval(substr($evEspe->fin, 11, 2));
                        $hora_ini_int = intval(substr($evEspe->inicio, 11, 2));
                        $eachEspes['y'] += $hora_fin_int - $hora_ini_int;
                    }
                }

                $porcentajePorInstitutoEspecial[] = $eachEspes;
            }
        }
        // ESPECIALES SIN INSTITUTO
        if (sizeof($evesespes) > 0) {
            $otrosEspe = array(
                'name' => 'SIN INSTITUTO',
                'y' => 0,
                'color' => 'black'
            );
            foreach ($evesespes as $evEspe) {
                if ($evEspe->ID_Carrera == null) {
                    $hora_fin_int = intval(substr($evEspe->fin, 11, 2));
                    $hora_ini_int = intval(substr($evEspe->inicio, 11, 2));
                    $otrosEspe['y'] += $hora_fin_int - $hora_ini_int;
                }
            }
            $porcentajePorInstitutoEspecial[] = $otrosEspe;
        }

        // REPORTE PORCENTAJE POR INSTITITUTO POR DIA
        // OBTENER HORAS TOTALES PARA EL CICLO (Hora por aula es 22-8 = 14hs)
        $cantHorasPorDia = sizeof(Aula::find()->all()) * 14;
        $resulta2 = array();
        foreach($institutos as $ins){
            $insArray = array(
                "Lunes" => 0,
                "Martes" => 0,
                "Miercoles" => 0,
                "Jueves" => 0,
                "Viernes" => 0,
                "Sabado" => 0,
            );
            $colors[$ins->NOMBRE] = $ins->COLOR_HEXA;
            foreach($ins->carreras as $carr){

                // por dia
                foreach($carr->materias as $mat){
                    foreach($mat->comisions as $comi){
                        foreach ($comi->eventoCalendars as $event) {
                            switch ($event->dow) {
                                case 1:
                                    $hora_fin_int = intval(substr($event->Hora_fin, 0, 2));
                                    $hora_ini_int = intval(substr($event->Hora_ini, 0, 2));
                                    $insArray["Lunes"] += $hora_fin_int - $hora_ini_int;
                                    break;
                                case 2:
                                    $hora_fin_int = intval(substr($event->Hora_fin, 0, 2));
                                    $hora_ini_int = intval(substr($event->Hora_ini, 0, 2));
                                    $insArray["Martes"] += $hora_fin_int - $hora_ini_int;
                                    break;
                                case 3:
                                    $hora_fin_int = intval(substr($event->Hora_fin, 0, 2));
                                    $hora_ini_int = intval(substr($event->Hora_ini, 0, 2));
                                    $insArray["Miercoles"] += $hora_fin_int - $hora_ini_int;
                                    break;
                                case 4:
                                    $hora_fin_int = intval(substr($event->Hora_fin, 0, 2));
                                    $hora_ini_int = intval(substr($event->Hora_ini, 0, 2));
                                    $insArray["Jueves"] += $hora_fin_int - $hora_ini_int;
                                    break;
                                case 5:
                                    $hora_fin_int = intval(substr($event->Hora_fin, 0, 2));
                                    $hora_ini_int = intval(substr($event->Hora_ini, 0, 2));
                                    $insArray["Viernes"] += $hora_fin_int - $hora_ini_int;
                                    break;
                                case 6:
                                    $hora_fin_int = intval(substr($event->Hora_fin, 0, 2));
                                    $hora_ini_int = intval(substr($event->Hora_ini, 0, 2));
                                    $insArray["Sabado"] += $hora_fin_int - $hora_ini_int;
                                    break;
                            }
                        }
                    }
                }
            }
            $resulta2[$ins->NOMBRE] = $insArray;
        }
        $colors["LIBRE"] = "grey";
        $resulta2["LIBRE"] = array(
            "Lunes" => $cantHorasPorDia,
            "Martes" => $cantHorasPorDia,
            "Miercoles" => $cantHorasPorDia,
            "Jueves" => $cantHorasPorDia,
            "Viernes" => $cantHorasPorDia,
            "Sabado" => $cantHorasPorDia,
        );
        // Agrego tiempo ocioso
        foreach ($resulta2 as $k1 => $insArray) {
            // REGLA DE 3 $cantHorasPorDia => 100%
            if ($k1 != "LIBRE") {
                foreach ($insArray as $k => $v) {
                    $resulta2["LIBRE"][$k] -= $v;
                    // Lo paso a porcentaje
                }
            }
        }

        foreach($resulta2 as &$k){
            foreach($k as &$v){
                $v = ($v * 100) / $cantHorasPorDia;
            }
        }

        // REPORTE ACTIVIDAD DE LOS USUARIOS CREANDO
        $usuarios = Users::find()->all();
        $actividadCreando = array();

        if (sizeof($usuarios) > 0) {
            foreach ($usuarios as $user) {
                $cantidadComisiones = 0;

                foreach ($eventos as $eve) {
                    if ($eve->ID_User_Asigna == $user->id) {
                        $cantidadComisiones++;
                    }
                }
                $actividadCreando["Comisiones"][$user->username] = $cantidadComisiones;

                $cantidadEspeciales = 0;

                foreach ($evesespes as $espe) {
                    if ($espe->ID_UCrea == $user->id) {
                        $cantidadEspeciales++;
                    }
                }
                $actividadCreando["Especiales"][$user->username] = $cantidadEspeciales;
            }
        }
        $actividadModificando = array();

        if (sizeof($usuarios) > 0) {
            foreach ($usuarios as $user) {
                $cantidadComisiones = 0;

                foreach ($eventos as $eve) {
                    if ($eve->ID_UModifica == $user->id) {
                        $cantidadComisiones++;
                    }
                }
                $actividadModificando["Comisiones"][$user->username] = $cantidadComisiones;

                $cantidadEspeciales = 0;

                foreach ($evesespes as $espe) {
                    if ($espe->ID_UModifica == $user->id) {
                        $cantidadEspeciales++;
                    }
                }
                $actividadModificando["Especiales"][$user->username] = $cantidadEspeciales;
            }
        }



        return $this->render(
            'reportes',
            [
                'cicloSess' => $cicloSess,
                'comisiones' => $comisiones,
                'especiales' => $especiales,
                'porcentajePorInstitutoComision' => $porcentajePorInstitutoComision,
                'porcentajePorInstitutoEspecial' => $porcentajePorInstitutoEspecial,
                'actividadCreando' => $actividadCreando,
                'actividadModificando' => $actividadModificando,
                'porcentajePorDiaPorInstituto' => $resulta2,
                'colors' => $colors
            ]
        );


    }
    public function actionUsers()
    {
        $query = Users::find();
        $pagination = new Pagination([
            'defaultPageSize' => 19,
            'totalCount' => $query->count(),
        ]);

        $users = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('users', [
            'users' => $users,
        ]);
    }



}