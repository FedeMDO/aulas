<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agenda_asig_comision".
 *
 * @property int $ID
 * @property int $ID_AULA
 * @property int $ID_COMISION
 * @property int $ID_DIA
 * @property string $PERIODO_LECTIVO
 * @property int $ID_HORA
 *
 * @property Aula $aULA
 * @property Comision $cOMISION
 * @property Hora $hORA
 * @property DiaSemana $dIA
 */
class AgendaAsigComision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda_asig_comision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_AULA', 'ID_COMISION', 'ID_DIA', 'PERIODO_LECTIVO', 'ID_HORA'], 'required'],
            [['ID_AULA', 'ID_COMISION', 'ID_DIA', 'ID_HORA'], 'integer'],
            [['PERIODO_LECTIVO'], 'string', 'max' => 6],
            [['ID_AULA'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['ID_AULA' => 'ID']],
            [['ID_COMISION'], 'exist', 'skipOnError' => true, 'targetClass' => Comision::className(), 'targetAttribute' => ['ID_COMISION' => 'ID']],
            [['ID_HORA'], 'exist', 'skipOnError' => true, 'targetClass' => Hora::className(), 'targetAttribute' => ['ID_HORA' => 'ID']],
            [['ID_DIA'], 'exist', 'skipOnError' => true, 'targetClass' => DiaSemana::className(), 'targetAttribute' => ['ID_DIA' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_AULA' => 'Id  Aula',
            'ID_COMISION' => 'Id  Comision',
            'ID_DIA' => 'Id  Dia',
            'PERIODO_LECTIVO' => 'Periodo  Lectivo',
            'ID_HORA' => 'Id  Hora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAULA()
    {
        return $this->hasOne(Aula::className(), ['ID' => 'ID_AULA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCOMISION()
    {
        return $this->hasOne(Comision::className(), ['ID' => 'ID_COMISION']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHORA()
    {
        return $this->hasOne(Hora::className(), ['ID' => 'ID_HORA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDIA()
    {
        return $this->hasOne(DiaSemana::className(), ['ID' => 'ID_DIA']);
    }
}
