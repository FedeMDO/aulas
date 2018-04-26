<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tramo".
 *
 * @property int $ID_TRAMO
 * @property string $INICIO
 * @property string $FIN
 * @property string $DURACION
 *
 * @property AgendaAula[] $agendaAulas
 */
class Tramo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tramo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['INICIO', 'FIN', 'DURACION'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TRAMO' => 'Id  Tramo',
            'INICIO' => 'Inicio',
            'FIN' => 'Fin',
            'DURACION' => 'Duracion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAulas()
    {
        return $this->hasMany(AgendaAula::className(), ['ID_TRAMO' => 'ID_TRAMO']);
    }
}
