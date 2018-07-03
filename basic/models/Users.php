<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Users extends ActiveRecord{
    
    public static function getDb()
    {
        return Yii::$app->db;
    }
    
    public static function tableName()
    {
        return 'users';
    }
    public function getInstituto()
    {
        return $this->hasOne(Instituto::className(), ['ID' => 'idInstituto']);
    }

}
