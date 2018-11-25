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
use app\models\Notificacion;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\User;
use yii\web\Session;
use app\models\FormRecoverPass;
use app\models\FormResetPass;
use dominus77\sweetalert2;
use yii\data\Pagination;


class SiteController extends Controller
{   
    public function actionRecoverpass()
    {
        $model = new FormRecoverPass;

        $msg = null;
        $msgi = null;
  
        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->validate())
            {
                $table = Users::find()->where("email=:email", [":email" => $model->email]);
        
                if ($table->count() == 1)
                {

                    $session = new Session;
                    $session->open();
                    $session["recover"] = $this->randKey("abcdef0123456789", 200);
                    $recover = $session["recover"]; 
                    $table = Users::find()->where("email=:email", [":email" => $model->email])->one();
                    $session["id_recover"] = $table->id;
                    $verification_code = $this->randKey("abcdef0123456789", 8);
                    $table->verification_code = $verification_code;
                    $table->save();
                    
                    //Creamos el mensaje que será enviado a la cuenta de correo del usuario
                    $subject = "Recuperar contraseña";
                    $body = "<p>Copie el siguiente código de verificación para restablecer su contraseña ... ";
                    $body .= "<strong>".$verification_code."</strong></p>";
                    $body .= "<p><a href='http://yii.local/site/resetpass'>Recuperar password</a></p>";

                    //Enviamos el correo
                    Yii::$app->mailer->compose()
                    ->setTo($model->email)
                    ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
                    ->setSubject($subject)
                    ->setHtmlBody($body)
                    ->send();
                    
                    $model->email = null;
                    
                    $alert=\dominus77\sweetalert2\Alert::TYPE_SUCCESS;
                    
                    $msgi = Yii::$app->session->setFlash($alert, 'Solicitud enviada!');;
                }
                else
                {
                    $error=\dominus77\sweetalert2\Alert::TYPE_ERROR;
                    $msg = Yii::$app->session->setFlash($error, 'Error, correo no encontrado.');;
                }
            }
    
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("recoverpass", ["model" => $model, "msg" => $msg,"msgi" => $msgi]);
    }
 
    public function actionResetpass()
    {
        $model = new FormResetPass; 
        $msg = null;
        
        $session = new Session;
        $session->open();
        
        $recover = $session["recover"];
        $model->recover = $recover;
        
        $id_recover = $session["id_recover"];

        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->validate())
            {
                if ($recover == $model->recover)
                {
                    $table = Users::findOne(["email" => $model->email, "id" => $id_recover, "verification_code" => $model->verification_code]);
                    $table->password = crypt($model->password, Yii::$app->params["salt"]);
     
                    if ($table->save())
                    {
                        $session->destroy();
      
                        $model->email = null;
                        $model->password = null;
                        $model->password_repeat = null;
                        $model->recover = null;
                        $model->verification_code = null;   
                        $msg = "Password reseteado correctamente, redireccionando a la página de login ...";
                        $msg .= "<meta http-equiv='refresh' content='5; ".Url::toRoute("site/login")."'>";
                    }
                    else
                    {
                        $msg = "Ha ocurrido un error";
                    }
                }
                else
                {
                    $model->getErrors();
                }
            }
        }
    return $this->render("resetpass", ["model" => $model, "msg" => $msg]);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
            'only' => ['user', 'admin','aula', 'register'], //acciones que solamente va a verificar permisos
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['logout','admin','register'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                       'actions' => ['logout'],
                       'allow' => true,
                       'roles' => ['@'],
                       'matchCallback' => function ($rule, $action) {
                          return User::isUserSimple(Yii::$app->user->identity->id);
                      },
                   ],
                   [
                    //Los usuarios guest tienen permisos sobre las siguientes acciones
                    'actions' => ['logout'],
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    private function randKey($str='', $long=0)
    {
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }

    public function actionRegister()
    {
        $model = new FormRegister;
   
        $msg = null;
        
        //Validación mediante ajax
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
   
        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new Users;
                if($model->rol == 1 || $model->rol == null){ //rol user simple
                    $table->rol = 10;
                }
                if($model->rol == 0){ //rol admin
                    $table->rol = 20;
                }
                if($model->rol == 2){ //rol guest
                    $table->rol = 30;
                }
                $table->username = $model->username;
                $table->email = $model->email;
                $table->idInstituto = $model->idInstituto;
                $table->password = crypt($model->password, Yii::$app->params["salt"]);
                $table->authKey = $this->randKey("abcdef0123456789", 200);
                $table->accessToken = $this->randKey("abcdef0123456789", 200);

                if ($table->insert())
                {
                    $user = $table->find()->where(["email" => $model->email])->one();
                    $id = urlencode($user->id);
                    $authKey = urlencode($user->authKey);
                    
                    $subject = "Confirmar registro";
                    $body = "<h1>Haga click en el siguiente enlace para finalizar tu registro</h1>";
                    $body .= "<a href='http://yii.local/site/confirm?id=".$id."&authKey=".$authKey."'>Confirmar</a>";
                    
                    //Enviamos el correo
                    Yii::$app->mailer->compose()
                    ->setTo($user->email)
                    ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
                    ->setSubject($subject)
                    ->setHtmlBody($body)
                    ->send();
                    
                    $session = Yii::$app->session;
                    $session->setFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS, "Usuario registrado. Sólo falta que confirme desde su correo electrónico");
                    $model->username = null;
                    $model->email = null;
                    $model->idInstituto = null;
                    $model->rol = null;
                    $model->password = null;
                    $model->password_repeat = null;
                }
                else
                {
                    $msg = "Ha ocurrido un error al llevar a cabo el registro";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("register", ["model" => $model, "msg" => $msg]);
    }
    /**
     * {@inheritdoc}
     */
    public function actionConfirm()
    {
        $table = new Users;
    
        if (Yii::$app->request->get())
        {
            $id = Html::encode($_GET["id"]);
            $authKey = $_GET["authKey"];
        
            if ((int) $id)
            {
                $model = $table
                ->find()
                ->where("id=:id", [":id" => $id])
                ->andWhere("authKey=:authKey", [":authKey" => $authKey]);
 
                if ($model->count() == 1)
                {
                    $activar = Users::findOne($id);
                    $activar->activate = 1;
                    if ($activar->update())
                    {
                        echo "Registro realizado correctamente, redireccionando ...";
                        echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                    }
                    else
                    {
                        echo "Ha ocurrido un error, redireccionando ...";
                        echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                    }
                }
                else
                {
                    return $this->redirect(["site/login"]);
                }
            }
            else
            {
                return $this->redirect(["site/login"]);
            }
        }
    }
 
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
   
            return $this->actionIndex();
        }   
 
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
   
            if (User::isUserAdmin(Yii::$app->user->identity->id))
            {
                return $this->actionIndex();
            }
            else
            {
                 return $this->actionIndex();
            }
   
        } else 
        {
            return $this->render('login', [
                'model' => $model,]);
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
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
                        $body .= "<p><a href='http://yii.local/site/noti'>Ver notificación</a></p>";
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
