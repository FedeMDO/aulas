<?php

namespace app\controllers;

use Yii;
use app\models\Aula;
use app\models\BuscadorModel;
use app\models\AulaSearch;
use app\models\Recurso;
use app\models\RecursoSearch;
use app\models\Edificio;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use yii\data\Pagination;
use yii\helpers\VarDumper;
use app\models\Sede;
use app\models\FormRegister;
use yii\helpers\ArrayHelper;

/**
 * AulaController implements the CRUD actions for Aula model.
 */
class AulaController extends Controller
{


    public function actionAulafilter($id)
    {
         $query = Aula::find()
        ->where(['ID_EDIFICIO' =>$id]);

        $pagination = new Pagination([
            'defaultPageSize' => 19,
            'totalCount' => $query->count(),
        ]);

        $aula = $query->orderBy('ID')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

   

    return $this->render('aulafilter', [
        'aula' => $aula,
        'pagination' => $pagination,
        
    ]);
    }
    public function actionRecursos($id)
    {
        $query = Aula::find()
        ->where(['ID' =>$id]);
        
            $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $aula = $query->orderBy('ID')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
   

    return $this->render('recursos', [
        'aula' => $aula,
        'pagination' => $pagination,
        ]);

    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','view','create','update','delete','aulafilter'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['index','view','create','update','delete','aulafilter'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserAdmin(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                       'actions' => ['index','view','aulafilter'],
                       //Esta propiedad establece que tiene permisos
                       'allow' => true,
                       //Usuarios autenticados, el signo ? es para invitados
                       'roles' => ['@'],
                       //Este método nos permite crear un filtro sobre la identidad del usuario
                       //y así establecer si tiene permisos o no
                       'matchCallback' => function ($rule, $action) {
                          //Llamada al método que comprueba si es un usuario simple
                          return User::isUserSimple(Yii::$app->user->identity->id);
                      },
                   ],
                   [
                    //Los usuarios guest tienen permisos sobre las siguientes acciones
                    'actions' => ['aulafilter'],
                    //Esta propiedad establece que tiene permisos
                    'allow' => true,
                    //Usuarios autenticados, el signo ? es para invitados
                    'roles' => ['@'],
                    //Este método nos permite crear un filtro sobre la identidad del usuario
                    //y así establecer si tiene permisos o no
                    'matchCallback' => function ($rule, $action) {
                    //Llamada al método que comprueba si es un usuario guest
                        return User::isUserGuest(Yii::$app->user->identity->id);
                    },
                ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'index' => ['GET']
                ],
            ],
        ];
    }

    /**
     * Lists all Aula models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AulaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aula model.
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
     * Creates a new Aula model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aula();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Aula model.
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
     * Deletes an existing Aula model.
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
     * Finds the Aula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aula::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionBuscador()
    {

        if($_POST!= null){
            $aux=0;
            $aulasCumplen = array();
            $ID_recursos =$_POST['Recurso'];
            $ID_recursos =$ID_recursos['ID'];
            $ID_edificio =$_POST['Edificio'];
            $buscador =$_POST['BuscadorModel'];
            $capacidad = $buscador['CAPACIDAD'];
            $piso=$buscador["PISO"];
            $edi= Edificio::findOne($ID_edificio);
            $aulasEdificio = $edi->aulas;
            foreach($aulasEdificio as $aula){
                $result = ArrayHelper::map($aula->rECURSOs, 'ID', 'NOMBRE');
                if ($ID_recursos != ""){
                foreach ($result  as $recurso => $key1){
                    for ($i = 0; $i <= $contadorRecursos = count($ID_recursos)-1; $i++) {
                        if($recurso == $ID_recursos[$i]){
                            $aux++;
                            }
                        if($aux == count($ID_recursos)){
                            if(count($ID_recursos) <= count($result)){
                                $aux = 0;
                                if($piso !="" && $capacidad !=""){
                                    if ($aula->PISO == $piso){
                                        if ($aula->CAPACIDAD >= $capacidad){
                                            $aulasCumplen[] = $aula;
                                        }
                                    
                                    }
                                }
                                if($capacidad=="" & $piso==""){
                                    $aulasCumplen[] = $aula;
                                }
                                if($capacidad=="" & $piso!=""){
                                    if ($aula->PISO == $piso){
                                        $aulasCumplen[] = $aula;
                                    }
                                }
                                if($capacidad!="" && $piso==""){
                                    if ($aula->CAPACIDAD >= $capacidad){
                                        $aulasCumplen[] = $aula;
                                    }
                                }
                            }
                            else{
                                $aux=0;
                            }
                            }
                        }
                }
                }
                else{
                    if($capacidad=="" & $piso==""){
                        $aulasCumplen[] = $aula;
                    }
                    if($capacidad=="" & $piso!=""){
                        if ($aula->PISO == $piso){
                            $aulasCumplen[] = $aula;
                        }
                    }
                    if($capacidad!="" && $piso==""){
                        if ($aula->CAPACIDAD >= $capacidad){
                            $aulasCumplen[] = $aula;
                        }
                    }
                }
            }
            return $this->render('BuscadorResultado', [
                'aulasCumplen' => $aulasCumplen,
                'edi' => $edi
            ]);
            
           
        }

        $recursos= new Recurso();
        $edificio = new Edificio();
        $sedes= new Sede();
        $buscador = new BuscadorModel();

        $query = Recurso::find();
        
            $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);


    return $this->render('Buscador', [
        'model' => $recursos,
        'pagination' => $pagination,
        'edificio'=> $edificio,
        'sedes'=> $sedes,
        'buscador'=> $buscador,
        ]);

    }

    public function actionListedificio($id)
    {
        $edificios = Edificio::find()
            ->where(['ID_SEDE' => $id])
            ->orderBy('id DESC')
            ->all();

        if (!empty($edificios)) {
            foreach($edificios as $edificio) {
                echo "<option value='".$edificio->ID."'>".$edificio->NOMBRE."</option>";
            }
        } else {
            echo "<option>-</option>";
        }

    }
    public function actionObserva($id){
        $model = new Aula();
        $aula = Aula::findOne($id);
        if ($_POST != null){
            if ($_POST['Aula'] == 'borrar'){
                $aula->OBS = NULL;
                $aula->save();
            }
            else{
                $aula1 = $_POST['Aula'];
                $obs = $aula1['OBS'];
                $aula->OBS = $obs;
                $aula->save();
            }
        }
        return $this->render('observa', [
            'model' => $model,
            'aula' => $aula,
        ]);
    }

}
