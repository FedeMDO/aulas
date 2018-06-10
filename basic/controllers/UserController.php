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
       
        return $this->render('noti');
    }
}