<?php

namespace app\controllers;

use Yii;
use app\models\Comision;
use app\models\ComisionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;

/**
 * ComisionController implements the CRUD actions for Comision model.
 */
class ComisionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'user'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['index','view','create','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                       'actions' => ['create'],
                       'allow' => true,
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
     * Lists all Comision models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout='LayoutAdmin';
        $searchModel = new ComisionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comision model.
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
     * Creates a new Comision model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comision();

        if ($_POST != NULL){
            $cantidad = $_POST['Comision'];
            $cantidad =$cantidad['cant_comisiones'];
            for( $i=0; $i<$cantidad; $i++){
                $comi = new Comision();
                $comi->load(Yii::$app->request->post());
                $comi->save();
                $session = Yii::$app->session;
                $session->setFlash('comisionesCreadas', "Se han creado correctamente $cantidad comisiones");
            }
        }

     /*   if ($model->load(Yii::$app->request->post()) && $model->slave()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }   */

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Comision model.
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
     * Deletes an existing Comision model.
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
     * Finds the Comision model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comision the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comision::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
