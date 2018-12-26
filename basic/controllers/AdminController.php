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
use app\models\EventoCalendar;
use app\models\EspecialCalendar;


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
    public function actionReportes(){
         // REPORTE USO DEL ESPACIO POR DIA
        $eventos = EventoCalendar::find()->all();

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

        // REPORTE PORCENTAJE POR INSTITUTO
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

        // REPORTE ACTIVIDAD DE LOS USUARIOS CREANDO
        $usuarios = Users::find()->all();
        $actividadCreando = array();
        
        if (sizeof($usuarios) > 0) {
            foreach($usuarios as $user){
                $cantidadComisiones = 0;

                foreach($eventos as $eve){
                    if($eve->ID_User_Asigna == $user->id){
                        $cantidadComisiones++;
                    }
                }
                $actividadCreando["Comisiones"][$user->username] = $cantidadComisiones;

                $cantidadEspeciales = 0;

                foreach($evesespes as $espe){
                    if($espe->ID_UCrea == $user->id){
                        $cantidadEspeciales++;
                    }
                }
                $actividadCreando["Especiales"][$user->username] = $cantidadEspeciales;
            }
        }
        $actividadModificando = array();
        
        if (sizeof($usuarios) > 0) {
            foreach($usuarios as $user){
                $cantidadComisiones = 0;

                foreach($eventos as $eve){
                    if($eve->ID_UModifica == $user->id){
                        $cantidadComisiones++;
                    }
                }
                $actividadModificando["Comisiones"][$user->username] = $cantidadComisiones;

                $cantidadEspeciales = 0;

                foreach($evesespes as $espe){
                    if($espe->ID_UModifica == $user->id){
                        $cantidadEspeciales++;
                    }
                }
                $actividadModificando["Especiales"][$user->username] = $cantidadEspeciales;
            }
        }



         return $this->render(
            'reportes',
            [
                'comisiones' => $comisiones,
                'especiales' => $especiales,
                'porcentajePorInstitutoComision' => $porcentajePorInstitutoComision,
                'porcentajePorInstitutoEspecial' => $porcentajePorInstitutoEspecial,
                'actividadCreando' => $actividadCreando,
                'actividadModificando' => $actividadModificando
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