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
use app\models\Notificacion;
use app\models\User;
use yii\data\Pagination;

class UserController extends Controller
{
    public function actionUser()
    {
        return $this->render('@app/views/User/user.php');
    }

    public function actionSedesv()
    {
       
        return $this->render('sedesv');
    }

    public function actionNoti()
    {
        $query = Notificacion::find()
        ->where(['ID_USER_RECEPTOR' => Yii::$app->user->identity->id]);

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);
    
        $notificacion = $query->orderBy('ID')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
       

        return $this->render('noti', [
            'notificacion' => $notificacion,
            'pagination' => $pagination,
            
        ]);
    }

}