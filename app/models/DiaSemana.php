<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dia_semana".
 *
 * @property int $ID
 * @property string $NOMBRE
 * @property string $NOM_ABREV
 *
 * @property AgendaAsigComision[] $agendaAsigComisions
 * @property AgendaAsigHoras[] $agendaAsigHoras
 */
class DiaSemana extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dia_semana';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE'], 'string', 'max' => 10],
            [['NOM_ABREV'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NOMBRE' => 'Nombre',
            'NOM_ABREV' => 'Nom  Abrev',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAsigComisions()
    {
        return $this->hasMany(AgendaAsigComision::className(), ['ID_DIA' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAsigHoras()
    {
        return $this->hasMany(AgendaAsigHoras::className(), ['ID_DIA' => 'ID']);
    }
}
