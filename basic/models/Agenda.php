<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agenda_asig_horas".
 *
 * @property int $ID
 * @property int $ID_HORA
 * @property int $ID_DIA
 * @property int $ID_AULA
 * @property int $ID_USER_ASIGNA
 * @property int $ID_USER_RECIBE
 * @property int $COMISION_ASIGNADA
 * @property string $PERIODO_LECTIVO
 *
 * @property Hora $hORA
 * @property DiaSemana $dIA
 * @property Aula $aULA
 * @property Users $uSERASIGNA
 * @property Users $uSERRECIBE
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda_asig_horas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_HORA', 'ID_DIA', 'ID_AULA', 'ID_USER_ASIGNA', 'ID_USER_RECIBE', 'PERIODO_LECTIVO'], 'required'],
            [['ID_HORA', 'ID_DIA', 'ID_AULA', 'ID_USER_ASIGNA', 'ID_USER_RECIBE'], 'integer'],
            [['COMISION_ASIGNADA'], 'string', 'max' => 1],
            [['PERIODO_LECTIVO'], 'string', 'max' => 6],
            [['ID_HORA'], 'exist', 'skipOnError' => true, 'targetClass' => Hora::className(), 'targetAttribute' => ['ID_HORA' => 'ID']],
            [['ID_DIA'], 'exist', 'skipOnError' => true, 'targetClass' => DiaSemana::className(), 'targetAttribute' => ['ID_DIA' => 'ID']],
            [['ID_AULA'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['ID_AULA' => 'ID']],
            [['ID_USER_ASIGNA'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_USER_ASIGNA' => 'id']],
            [['ID_USER_RECIBE'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_USER_RECIBE' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_HORA' => 'Id  Hora',
            'ID_DIA' => 'Id  Dia',
            'ID_AULA' => 'Id  Aula',
            'ID_USER_ASIGNA' => 'Id  User  Asigna',
            'ID_USER_RECIBE' => 'Id  User  Recibe',
            'COMISION_ASIGNADA' => 'Comision  Asignada',
            'PERIODO_LECTIVO' => 'Periodo  Lectivo',
        ];
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
    public function getUSERASIGNA()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_USER_ASIGNA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSERRECIBE()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_USER_RECIBE']);
    }
}
