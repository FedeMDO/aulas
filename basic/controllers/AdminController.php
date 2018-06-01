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




}