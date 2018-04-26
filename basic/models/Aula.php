<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aula".
 *
 * @property int $ID_AULA
 * @property int $ID_EDIFICIO
 * @property int $PISO
 * @property int $CAPACIDAD
 *
 * @property AgendaAula[] $agendaAulas
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
            [['ID_EDIFICIO'], 'exist', 'skipOnError' => true, 'targetClass' => Edificio::className(), 'targetAttribute' => ['ID_EDIFICIO' => 'ID_EDIFICIO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_AULA' => 'Id  Aula',
            'ID_EDIFICIO' => 'Id  Edificio',
            'PISO' => 'Piso',
            'CAPACIDAD' => 'Capacidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAulas()
    {
        return $this->hasMany(AgendaAula::className(), ['ID_AULA' => 'ID_AULA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEDIFICIO()
    {
        return $this->hasOne(Edificio::className(), ['ID_EDIFICIO' => 'ID_EDIFICIO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaRecursos()
    {
        return $this->hasMany(AulaRecurso::className(), ['ID_AULA' => 'ID_AULA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRECURSOs()
    {
        return $this->hasMany(Recurso::className(), ['ID_RECURSO' => 'ID_RECURSO'])->viaTable('aula_recurso', ['ID_AULA' => 'ID_AULA']);
    }
}
