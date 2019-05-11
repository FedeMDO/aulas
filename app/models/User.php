<?php

namespace app\models;
use yii\web\IdentityInterface;
use app\controllers\SiteController;


class User extends \yii\base\baseObject implements \yii\web\IdentityInterface
{
    
    public $id;
    public $username;
    public $email;
    public $password;
    public $authKey;
    public $accessToken;
    public $activate;
    public $idInstituto;
    public $rol;
    public $verification_code;
    public $profile_picture;


    /**
     * @inheritdoc
     */
    
    /* busca la identidad del usuario a través de su $id */
    //comprueba si el USER es ADmin retorna un bool
    public static function isUserAdmin($id)
    {
       if (Users::findOne(['id' => $id, 'activate' => '1', 'rol' => 20])){
        return true;
       } else {

        return false;
       }

    }
//comprueba si el USER es simple retorna un bool
    public static function isUserSimple($id)
    {
       if (Users::findOne(['id' => $id, 'activate' => '1', 'rol' => 10])){
       return true;
       } else {

       return false;
       }
    }
    public static function isUserGuest($id)
    {
       if (Users::findOne(['id' => $id, 'activate' => '1', 'rol' => 30])){
           return true;
       } 
       else {
           return false;
       }
    }

    public static function findIdentity($id)
    {
        
        $user = Users::find()
                ->where("activate=:activate", [":activate" => 1])
                ->andWhere("id=:id", ["id" => $id])
                ->one();
        
        return isset($user) ? new static($user) : null;
    }
    public static function getUsername($id)
    {
        $user = Users::find()
                ->where("activate=:activate", [":activate" => 1])
                ->andWhere("id=:id", ["id" => $id])
                ->one();
        
        return $user->username;
    }
    /**
     * @inheritdoc
     */
    
    /* Busca la identidad del usuario a través de su token de acceso */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        
        $users = Users::find()
                ->where("activate=:activate", [":activate" => 1])
                ->andWhere("accessToken=:accessToken", [":accessToken" => $token])
                ->all();
        
        foreach ($users as $user) {
            if ($user->accessToken === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * 
     * 
     * 
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    
    /* Busca la identidad del usuario a través del username */
    public static function findByUsername($username)
    {
        $users = Users::find()
                ->where("activate=:activate", ["activate" => 1])
                ->andWhere("username=:username", [":username" => $username])
                ->all();
        
        foreach ($users as $user) {
            if (strcasecmp($user->username, $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    public static function findByEmail($email){
        $users = Users::find()
                ->where("activate=:activate", ["activate" => 1])
                ->andWhere("email=:email", [":email" => $email])
                ->all();
        
        foreach ($users as $user) {
            if (strcasecmp($user->email, $email) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */

    public function getEventoCalendars()
    {
        return $this->hasMany(EventoCalendar::className(), ['ID_User_Asigna' => 'id']);
    }

    public function getRestriCalendars()
    {
        return $this->hasMany(RestriCalendar::className(), ['ID_User_Recibe' => 'id']);
    }
    
    public function getInstituto()
    {
        return $this->hasOne(Instituto::className(), ['ID' => 'idInstituto']);
    }


    /* Regresa el id del usuario */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    
    /* Regresa la clave de autenticación */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    
    /* Valida la clave de autenticación */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        /* Valida el password */
        if (SiteController::encrypt_decrypt('encrypt', $password) == $this->password)
        {
        return $password === $password;
        }
    }
}
