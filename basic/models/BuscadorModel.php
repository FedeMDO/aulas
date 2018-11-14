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
            [['PISO'], 'required', 'message' => 'Campo requerido'],
            [['CAPACIDAD'], 'required', 'message' => 'Campo requerido'],
        ];
    }
    
}