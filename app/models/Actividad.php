<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividad".
 *
 * @property int $ID
 * @property int $ID_AULA
 * @property int $ID_USUARIO
 * @property string $USER_REALIZA
 * @property string $ACCION
 * @property string $MOMENTO
 *
 * @property Aula $aULA
 * @property Users $uSUARIO
 */
class Actividad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_AULA', 'ID_USUARIO', 'USER_REALIZA', 'ACCION'], 'required'],
            [['ID_AULA', 'ID_USUARIO'], 'integer'],
            [['MOMENTO'], 'safe'],
            [['USER_REALIZA'], 'string', 'max' => 100],
            [['ACCION'], 'string', 'max' => 200],
            [['ID_AULA'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['ID_AULA' => 'ID']],
            [['ID_USUARIO'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_USUARIO' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_AULA' => 'Id Aula',
            'ID_USUARIO' => 'Id Usuario',
            'USER_REALIZA' => 'User Realiza',
            'ACCION' => 'Accion',
            'MOMENTO' => 'Momento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAULA()
    {
        return $this->hasOne(Aula::className(), ['ID' => 'ID_AULA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSUARIO()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_USUARIO']);
    }
}
