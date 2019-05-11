<?php

namespace app\models;

use Yii;
use yii\base\InvalidParamException;
use yii\base\model;
use app\models\User;
use app\controllers\SiteController;
 
/**
 * Change password form for current user only
 */
class FormChangePassword extends Model
{
    public $id;
    public $current_password;
    public $password;
    public $confirm_password;
 
    /**
     * @var app\models\User
     */
    public $_user;
 
    /**
     * Creates a form model given a token.
     *
     * @param  string                          $token
     * @param  array                           $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($id, $config = [])
    {
        $this->_user = User::findIdentity($id);
        
        if (!$this->_user) {
            throw new InvalidParamException('Unable to find user!');
        }
        
        $this->id = $this->_user->id;
        parent::__construct($config);
    }
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['current_password', 'password','confirm_password'], 'required', 'message' => 'Campo requerido'],
            [['password','confirm_password'], 'match', 'pattern' => "/^.{8,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Las contraseñas no coinciden'],
            ['current_password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        $user = User::findIdentity($this->id);

        if (!$user->validatePassword($this->current_password)) {
            $this->addError($attribute,'Contraseña incorrecta');
        }
    }
 
    public function changePassword()
    {
        $id = $this->_user->id;
        $table = Users::findOne(["id" => $id]);
        $table->password = Sitecontroller::encrypt_decrypt('encrypt', $this->password);
 
        return $table->save();
    }
}