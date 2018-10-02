<?php

namespace app\models;

use Yii;
use yii\base\InvalidParamException;
use yii\base\model;
use app\models\User;
 
/**
 * Change password form for current user only
 */
class FormChangePassword extends Model
{
    public $id;
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
            [['password','confirm_password'], 'required', 'message' => 'Campo requerido'],
            [['password','confirm_password'], 'match', 'pattern' => "/^.{8,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Las contraseñas no coinciden'],
        ];
    }
 
    public function changePassword()
    {
        $id = $this->_user->id;
        $table = Users::findOne(["id" => $id]);
        $table->password = crypt($this->password, Yii::$app->params["salt"]);
 
        return $table->save();
    }
}