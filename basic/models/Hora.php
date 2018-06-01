<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hora".
 *
 * @property int $ID
 * @property string $HORA
 *
 * @property AgendaAsigComision[] $agendaAsigComisions
 * @property AgendaAsigHoras[] $agendaAsigHoras
 */
class Hora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HORA'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'HORA' => 'Hora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAsigComisions()
    {
        return $this->hasMany(AgendaAsigComision::className(), ['ID_HORA' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAsigHoras()
    {
        return $this->hasMany(AgendaAsigHoras::className(), ['ID_HORA' => 'ID']);
    }
}
