<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciclo_lectivo".
 *
 * @property int $id
 * @property string $nombre
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $estado
 *
 * @property EventoCalendar[] $eventoCalendars
 * @property RestriCalendar[] $restriCalendars
 */
class CicloLectivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ciclo_lectivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['nombre', 'estado'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoCalendars()
    {
        return $this->hasMany(EventoCalendar::className(), ['ID_Ciclo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestriCalendars()
    {
        return $this->hasMany(RestriCalendar::className(), ['ID_Ciclo' => 'id']);
    }
}
