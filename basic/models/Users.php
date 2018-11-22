<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "instituto".
 *
 * @property Instituto $instituto
 */

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
     /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Nombre de usuario'
        ];
    }

}
