<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aula".
 *
 * @property int $ID
 * @property int $ID_EDIFICIO
 * @property int $PISO
 * @property int $CAPACIDAD
 *
 * @property AgendaAsigComision[] $agendaAsigComisions
 * @property AgendaAsigHoras[] $agendaAsigHoras
 * @property Edificio $eDIFICIO
 * @property AulaRecurso[] $aulaRecursos
 * @property Recurso[] $rECURSOs
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EDIFICIO'], 'required'],
            [['ID_EDIFICIO', 'PISO', 'CAPACIDAD'], 'integer'],
            [['ID_EDIFICIO'], 'exist', 'skipOnError' => true, 'targetClass' => Edificio::className(), 'targetAttribute' => ['ID_EDIFICIO' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_EDIFICIO' => 'Id  Edificio',
            'PISO' => 'Piso',
            'CAPACIDAD' => 'Capacidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAsigComisions()
    {
        return $this->hasMany(AgendaAsigComision::className(), ['ID_AULA' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAsigHoras()
    {
        return $this->hasMany(AgendaAsigHoras::className(), ['ID_AULA' => 'ID']);
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
}
