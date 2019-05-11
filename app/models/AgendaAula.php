<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agenda_aula".
 *
 * @property int $ID_AGENDA_AULA
 * @property int $ID_AULA
 * @property int $ID_COMISION
 * @property int $ID_DIA
 * @property int $PERIODO_LECTIVO
 * @property int $ID_TRAMO
 *
 * @property Aula $aULA
 * @property Comision $cOMISION
 * @property Tramo $tRAMO
 * @property DiaSemana $dIA
 */
class AgendaAula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda_aula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_AULA', 'ID_COMISION', 'ID_DIA', 'PERIODO_LECTIVO', 'ID_TRAMO'], 'required'],
            [['ID_AULA', 'ID_COMISION', 'ID_DIA', 'PERIODO_LECTIVO', 'ID_TRAMO'], 'integer'],
            [['ID_AULA'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['ID_AULA' => 'ID_AULA']],
            [['ID_COMISION'], 'exist', 'skipOnError' => true, 'targetClass' => Comision::className(), 'targetAttribute' => ['ID_COMISION' => 'ID_COMISION']],
            [['ID_TRAMO'], 'exist', 'skipOnError' => true, 'targetClass' => Tramo::className(), 'targetAttribute' => ['ID_TRAMO' => 'ID_TRAMO']],
            [['ID_DIA'], 'exist', 'skipOnError' => true, 'targetClass' => DiaSemana::className(), 'targetAttribute' => ['ID_DIA' => 'ID_DIA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_AGENDA_AULA' => 'Id  Agenda  Aula',
            'ID_AULA' => 'Id  Aula',
            'ID_COMISION' => 'Id  Comision',
            'ID_DIA' => 'Id  Dia',
            'PERIODO_LECTIVO' => 'Periodo  Lectivo',
            'ID_TRAMO' => 'Id  Tramo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAULA()
    {
        return $this->hasOne(Aula::className(), ['ID_AULA' => 'ID_AULA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCOMISION()
    {
        return $this->hasOne(Comision::className(), ['ID_COMISION' => 'ID_COMISION']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTRAMO()
    {
        return $this->hasOne(Tramo::className(), ['ID_TRAMO' => 'ID_TRAMO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDIA()
    {
        return $this->hasOne(DiaSemana::className(), ['ID_DIA' => 'ID_DIA']);
    }
}
