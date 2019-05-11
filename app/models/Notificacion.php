<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notificacion".
 *
 * @property int $ID
 * @property string $visto
 * @property int $ID_USER_EMISOR
 * @property int $ID_USER_RECEPTOR
 * @property string $NOTIFICACION
 * @property string $FECHA
 * @property string $BORRA_E
 * @property string $BORRA_R
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
            [['ID_USER_EMISOR', 'ID_USER_RECEPTOR', 'FECHA'], 'required'],
            [['ID_USER_EMISOR', 'ID_USER_RECEPTOR'], 'integer'],
            [['FECHA'], 'safe'],
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
            'ID_USER_EMISOR' => 'Usuario emisor',
            'ID_USER_RECEPTOR' => 'Usuario receptor',
            'NOTIFICACION' => 'Notificacion',
            'FECHA' => 'Fecha',
            'uSEREMISOR.username' => 'Usuario emisor',
            'uSERRECEPTOR.username' => 'Usuario receptor',
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
