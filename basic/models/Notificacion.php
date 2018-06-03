<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notificacion".
 *
 * @property int $ID
 * @property int $ID_USER_EMISOR
 * @property int $ID_USER_RECEPTOR
 * @property string $NOTIFICACION
 *
 * @property Users $uSEREMISOR
 * @property Users $uSERRECEPTOR
 */
class Notificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_USER_EMISOR', 'ID_USER_RECEPTOR'], 'required'],
            [['ID_USER_EMISOR', 'ID_USER_RECEPTOR'], 'integer'],
            [['NOTIFICACION'], 'string', 'max' => 300],
            [['ID_USER_EMISOR'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_USER_EMISOR' => 'id']],
            [['ID_USER_RECEPTOR'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_USER_RECEPTOR' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_USER_EMISOR' => 'Id  User  Emisor',
            'ID_USER_RECEPTOR' => 'Id  User  Receptor',
            'NOTIFICACION' => 'Notificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSEREMISOR()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_USER_EMISOR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSERRECEPTOR()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_USER_RECEPTOR']);
    }
}
