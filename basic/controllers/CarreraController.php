<?php

namespace app\controllers;

use Yii;
use app\models\Carrera;
use app\models\CarreraSearch;
use app\models\OfertaAcademica;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use yii\data\Pagination;
use app\models\EventoCalendar;
use app\models\EspecialCalendar;
use app\models\Instituto;
use app\models\Users;

/**
 * CarreraController implements the CRUD actions for Carrera model.
 */
class CarreraController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['carrerav', 'index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['carrerav', 'index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                        'actions' => ['carrerav'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserSimple(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                        'actions' => ['carrerav'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserGuest(Yii::$app->user->identity->id);
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionOfertaacademica()
    {
        //reporting test

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
            'ofertaacademica',
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

    private function sumarHoras($array)
    {
        $resultado = 0;
        foreach ($array as $e) {
            $resultado += $e;
        }
        return $resultado;
    }

    public function actionOfertabyparams($idCiclo, $strCarrera)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $oferta = OfertaAcademica::find()
            ->where(['Ciclo' => $idCiclo])
            ->andWhere(['Carrera' => $strCarrera])->all();
        $dias = array(
            0 => "Domingo",
            1 => "Lunes",
            2 => "Martes",
            3 => "Miércoles",
            4 => "Jueves",
            5 => "Viernes",
            6 => "Sabado",
        );
        $obj = array();
        $rowData = array();
        foreach ($oferta as $row) {
            unset($rowData);
            $rowData[] = $row->Carrera;
            $rowData[] = $row->Anio;
            $rowData[] = $row->Materia;
            $rowData[] = $row->Comision;
            $rowData[] = $dias[$row->Dia];
            $rowData[] = $row->HoraInicio;
            $rowData[] = $row->HoraFin;
            $rowData[] = $row->Sede;
            $rowData[] = $row->Edificio;
            $rowData[] = $row->Aula;
            $obj["data"][] = $rowData;
        }

        return (object)$obj;

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
    /**
     * Lists all Carrera models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'LayoutAdmin';
        $searchModel = new CarreraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCarrerav()
    {
        $query = Carrera::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
        ]);
        $carrera = $query->orderBy('ID_INSTITUTO')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('carrerav', [
            'carrera' => $carrera,
            'pagination' => $pagination,
        ]);


    }

    /**
     * Displays a single Carrera model.
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
     * Creates a new Carrera model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Carrera();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Carrera model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goBack();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Carrera model.
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
     * Finds the Carrera model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Carrera the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Carrera::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
