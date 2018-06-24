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

class AdminController extends Controller
{
    public function actionAdmin()
    {
        return $this->render('admin');
    }

    public function actionSedesv()
    {
       
        return $this->render('sedesv');
    }

    public function actionNoti()
    {
        if (User::isUserAdmin(Yii::$app->user->identity->id)) #si es admin, recibe los enviados y recibidos
        {
            $query = Notificacion::find()
            ->where(['ID_USER_EMISOR' => Yii::$app->user->identity->id])
            ->orWhere(['ID_USER_RECEPTOR' => Yii::$app->user->identity->id]);
        }
        elseif (User::isUserSimple(Yii::$app->user->identity->id)) #si es user. recibe los recibidos (no tiene enviados)
        {
            $query = Notificacion::find()
            ->where(['ID_USER_RECEPTOR' => Yii::$app->user->identity->id]);
        }

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);
    
        $notificacion = $query->orderBy(['Fecha'=>SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
            $model = new Notificacion();
            $model->ID_USER_EMISOR = Yii::$app->user->identity->id;
            $model->FECHA = new \yii\db\Expression('NOW()');
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $session = Yii::$app->session;
                $session->setFlash('notificacionEnviada', 'Has enviado correctamente la notificacion');
                return $this->redirect('noti');
            }        
       

        return $this->render('noti', [
            'notificacion' => $notificacion,
            'pagination' => $pagination,
            'model' => $model,
            
        ]);
    }


}