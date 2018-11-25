<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comision".
 *
 * @property int $ID
 * @property string $NUMERO
 * @property int $ID_MATERIA
 * @property int $CARGA_HORARIA_SEMANAL
 * @property int $ID_Ciclo
 *
 * @property AgendaAsigComision[] $agendaAsigComisions
 * @property Materia $mATERIA
 * @property CicloLectivo $ciclo
 * @property EventoCalendar[] $eventoCalendars
 */
class Comision extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comision';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NUMERO', 'ID_MATERIA', 'CARGA_HORARIA_SEMANAL', 'ID_Ciclo'], 'integer'],
            [['ID_MATERIA', 'CARGA_HORARIA_SEMANAL'], 'required'],
            [['ID_MATERIA'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['ID_MATERIA' => 'ID']],
            //[['ID_Ciclo'], 'exist', 'skipOnError' => true, 'targetClass' => CicloLectivo::className(), 'targetAttribute' => ['ID_Ciclo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NUMERO' => 'Numero',
            'ID_MATERIA' => 'Id  Materia',
            'CARGA_HORARIA_SEMANAL' => 'Carga  Horaria  Semanal',
            'ID_Ciclo' => 'Id  Ciclo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAsigComisions()
    {
        return $this->hasMany(AgendaAsigComision::className(), ['ID_COMISION' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMATERIA()
    {
        return $this->hasOne(Materia::className(), ['ID' => 'ID_MATERIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiclo()
    {
        return $this->hasOne(CicloLectivo::className(), ['id' => 'ID_Ciclo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoCalendars()
    {
        return $this->hasMany(EventoCalendar::className(), ['ID_Comision' => 'ID']);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->mATERIA->DESC_CORTA.$this->NUMERO;
    }
}
