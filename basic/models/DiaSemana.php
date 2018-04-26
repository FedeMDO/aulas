<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dia_semana".
 *
 * @property int $ID_DIA
 * @property string $NOMBRE
 * @property string $NOM_ABREV
 *
 * @property AgendaAula[] $agendaAulas
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
            'ID_DIA' => 'Id  Dia',
            'NOMBRE' => 'Nombre',
            'NOM_ABREV' => 'Nom  Abrev',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAulas()
    {
        return $this->hasMany(AgendaAula::className(), ['ID_DIA' => 'ID_DIA']);
    }
}
