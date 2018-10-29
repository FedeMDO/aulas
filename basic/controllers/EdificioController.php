<?php

namespace app\controllers;

use Yii;
use app\models\Edificio;
use app\models\Sede;
use app\models\Aula;
use app\models\EdificioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\User;
use yii\filters\AccessControl;

/**
 * EdificioController implements the CRUD actions for Edificio model.
 */
class EdificioController extends Controller
{
    public function actionScheduler($id_sede)
    {

        $sede = Sede::findOne($id_sede);



        return $this->render('schedulerPorSede', [
            'sede' => $sede,
        ]);
    }
    public function actionEdifilter($id)
    {
       
        if (User::isUserAdmin(Yii::$app->user->identity->id)) #si es admin, recibe los enviados y recibidos
        {
            $query = Edificio::find()
            ->where(['ID_SEDE' =>$id]);
        }
        elseif (User::isUserSimple(Yii::$app->user->identity->id)) #si es user. recibe los recibidos (no tiene enviados)
        {
            $query = Edificio::find()
            ->where(['ID_SEDE' =>$id]);
        }

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $edificio = $query->orderBy('ID')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

   

    return $this->render('edifilter', [
        'edificio' => $edificio,
        'pagination' => $pagination,
        'id' => $id,
    ]);


    }


    public function actionEdificiov()
    {

        $query = Edificio::find();


        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

    
        $edificio = $query->orderBy('ID')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

       

        return $this->render('edificiov', [
            'edificio' => $edificio,
            'pagination' => $pagination,
            
        ]);



    }


    /**
     * @inheritdoc
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
     * Lists all Edificio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EdificioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Edificio model.
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
     * Creates a new Edificio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Edificio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Edificio model.
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
     * Deletes an existing Edificio model.
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
     * Finds the Edificio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Edificio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Edificio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
