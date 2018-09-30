<?php
 
namespace app\models;
use Yii;
use yii\base\model;
 
class FormResetPass extends model{
 
    public $email;
 public $password;
 public $password_repeat;
 public $verification_code;
 public $recover;
     
    public function rules()
    {
        return [
            [['email', 'password', 'password_repeat', 'verification_code', 'recover'], 'required', 'message' => 'Campo requerido'],
            ['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            ['email', 'email', 'message' => 'Formato no válido'],
            ['password', 'match', 'pattern' => "/^.{8,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Los passwords no coinciden'],
        ];
    }
}