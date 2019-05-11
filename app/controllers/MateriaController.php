<?php

namespace app\controllers;

use Yii;
use app\models\Materia;
use app\models\MateriaSearch;
use app\models\Carrera;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Sede;
use app\models\Edificio;
use app\models\EventoCalendar;
use app\models\Instituto;

/**
 * MateriaController implements the CRUD actions for Materia model.
 */
class MateriaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Materia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'LayoutAdmin';
        $searchModel = new MateriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materia model.
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
     * Creates a new Materia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Materia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Materia model.
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
     * Deletes an existing Materia model.
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
     * Finds the Materia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Materia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Materia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionBuscador()
    {
        if ($_POST != null){
            $eventos = EventoCalendar::find()->all();
            $idmat = $_POST['Materia'];
            $idsede = $_POST['Sede'];
            if (isset($_POST['Edificio'])){
                $idedi = $_POST['Edificio'];
                $edif = $idedi['ID'];
            }
            else{
                $edif = "";
            }
            $result = $idmat['ID'];
            $sede = $idsede['ID'];
            $nombre = $this->findModel($result)->NOMBRE;
            $matched = array();
            foreach ($eventos as $evento){
                if ($sede == "" && $edif == "" && $evento->comision->mATERIA->ID == $result){
                    $matched[] = $evento;
                }
                if ($edif == "" && $evento->aula->eDIFICIO->sEDE->ID == $sede){
                    if ($evento->comision->mATERIA->ID == $result){
                        $matched[] = $evento;
                    }
                }
                if ($evento->aula->eDIFICIO->ID == $edif){
                    if ($evento->comision->mATERIA->ID == $result){
                        $matched[] = $evento;
                    }
                }
            }
            return $this->render('resultado', [
                'matched' => $matched,
                'nombre' => $nombre,
            ]);
        }
        $institutos = new Instituto();
        $carreras = new Carrera();
        $materias = new Materia();
        $sedes = new Sede();
        $edificio = new Edificio();
        $inst = Instituto::find()->asArray()->all();
        $carr = Carrera::find()->asArray()->all();
        $mat = Materia::find()->asArray()->all();
        $edi = Edificio::find()->asArray()->all();
        $sede = Sede::find()->asArray()->all();
        return $this->render('buscador', [
            'institutos' => $institutos,
            'carreras' => $carreras,
            'materias' => $materias,
            'sedes' => $sedes,
            'edificio' => $edificio,
            'inst' => $inst,
            'carr' => $carr,
            'mat' => $mat,
            'edi' => $edi,
            'sede' => $sede,
        ]);
    }

}
