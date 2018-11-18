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
                        'actions' => ['noti', 'panel'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                       'actions' => ['noti'],
                       'allow' => true,
                       'roles' => ['@'],
                       'matchCallback' => function ($rule, $action) {
                          return User::isUserSimple(Yii::$app->user->identity->id);
                      },
                   ],
                   [
                        //Los usuarios guest tienen permisos sobre las siguientes acciones
                        'actions' => ['noti'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserGuest(Yii::$app->user->identity->id);
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionPanel(){
        //
        return $this->render('panel');
    }

    public function actionNoti()
    {
        $query = Notificacion::find()
        ->where(['ID_USER_EMISOR' => Yii::$app->user->identity->id])
         ->orwhere(['ID_USER_RECEPTOR' => Yii::$app->user->identity->id]);

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);
    
        $notificacion = $query->orderBy(['Fecha'=>SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
            
            if ($_POST != null){
                if ($_POST['Notificacion'] == 'borrar'){
                    $id = $_POST['id'];
                    $query = Notificacion::findOne($id);
                    $query->delete();
                    $this->redirect('noti');
                }
                else{
                    $ID_Usuarios =$_POST['Notificacion'];
                    $mensaje = $_POST['Notificacion'];
                    $ID_Usuarios =$ID_Usuarios['ID_USER_RECEPTOR'];
                    $mensaje = $mensaje['NOTIFICACION'];
                    foreach ($ID_Usuarios as $user1){
                        $model1 = new Notificacion();
                        $model1->ID_USER_EMISOR = Yii::$app->user->identity->id;
                        $model1->ID_USER_RECEPTOR = $user1;
                        $model1->NOTIFICACION = $mensaje;
                        $model1->FECHA = new \yii\db\Expression('NOW()');
                        $model1->save();
                        //Enviamos correo
                        $receptor = Users::findOne($user1)->username;
                        $emisor = Users::findOne($model1->ID_USER_EMISOR)->username;
                        $mail = Users::findOne($user1)->email;
                        $subject = "Nueva notificación";
                        $body = "<p>Hola <strong>".$receptor."</strong>, tenes una nueva notificación de <strong>".$emisor."</strong>.</p>" ;
                        $body .= "<p> Notificación: <i>".$model1->NOTIFICACION."</i></p>";
                        $body .= "<p><a href='http://yii.local/admin/noti'>Ver notificación</a></p>";
                        try {
                        Yii::$app->mailer->compose()
                            ->setTo($mail)
                            ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
                            ->setSubject($subject)
                            ->setHtmlBody($body)
                            ->send();
                        }
                        catch (\Swift_TransportException $e) {
                        }
                    }
                    if ($model1->save()){
                        $session = Yii::$app->session;
                        //$session->setFlash('notificacionEnviada', 'Has enviado correctamente la notificacion');
                        Yii::$app->session->setFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS, 'Mensaje enviado!');
                        return $this->redirect('noti');
                    }
                }
            }
       
        $model = new Notificacion();
        $usuarios = Users::find()->where(['not', ['username' => Yii::$app->user->identity->username]])
        ->andWhere(['activate' =>1])->asArray()->all();
        return $this->render('noti', [
            'notificacion' => $notificacion,
            'pagination' => $pagination,
            'model' => $model,
            'usuarios' => $usuarios
            
        ]);  
    }


}