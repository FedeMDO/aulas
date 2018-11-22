<?php

namespace app\models;
use Yii;
use yii\base\model;
use app\models\Aula;

class BuscadorModel extends model{
 
    public $PISO;
    public $CAPACIDAD;
 
    public function  rules()
    {
        return [
            [['PISO'], 'safe', 'message' => 'Campo requerido'],
            [['CAPACIDAD'], 'safe', 'message' => 'Campo requerido'],
        ];
    }
    
}