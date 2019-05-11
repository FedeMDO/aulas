<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turno".
 *
 * @property int $ID
 * @property string $HORA_DESDE
 * @property string $HORA_HASTA
 */
class Turno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HORA_DESDE', 'HORA_HASTA'], 'required'],
            [['HORA_DESDE', 'HORA_HASTA'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'HORA_DESDE' => 'Hora  Desde',
            'HORA_HASTA' => 'Hora  Hasta',
        ];
    }
}
