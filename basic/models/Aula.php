<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aula".
 *
 * @property int $ID
 * @property string $NOMBRE
 * @property int $ID_EDIFICIO
 * @property int $PISO
 * @property int $CAPACIDAD
 * @property string $OBS
 *
 * @property Edificio $eDIFICIO
 * @property AulaRecurso[] $aulaRecursos
 * @property Recurso[] $rECURSOs
 * @property EventoCalendar[] $eventoCalendars
 * @property RestriCalendar[] $restriCalendars
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOMBRE', 'ID_EDIFICIO'], 'required'],
            [['ID_EDIFICIO', 'PISO', 'CAPACIDAD'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 40],
            [['OBS'], 'string', 'max' => 300],
            [['ID_EDIFICIO'], 'exist', 'skipOnError' => true, 'targetClass' => Edificio::className(), 'targetAttribute' => ['ID_EDIFICIO' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NOMBRE' => 'Nombre',
            'ID_EDIFICIO' => 'Id  Edificio',
            'PISO' => 'Piso',
            'CAPACIDAD' => 'Capacidad',
            'OBS' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEDIFICIO()
    {
        return $this->hasOne(Edificio::className(), ['ID' => 'ID_EDIFICIO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaRecursos()
    {
        return $this->hasMany(AulaRecurso::className(), ['ID_AULA' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRECURSOs()
    {
        return $this->hasMany(Recurso::className(), ['ID' => 'ID_RECURSO'])->viaTable('aula_recurso', ['ID_AULA' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoCalendars()
    {
        return $this->hasMany(EventoCalendar::className(), ['ID_Aula' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestriCalendars()
    {
        return $this->hasMany(RestriCalendar::className(), ['ID_Aula' => 'ID']);
    }
}
