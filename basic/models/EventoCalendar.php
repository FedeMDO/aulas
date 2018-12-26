<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evento_calendar".
 *
 * @property int $id
 * @property int $ID_Aula
 * @property int $ID_Comision
 * @property int $ID_UModifica
 * @property int $ID_User_Asigna
 * @property string $Hora_ini
 * @property string $Hora_fin
 * @property string $dow
 * @property int $ID_Instituto
 * @property int $ID_Ciclo
 * @property string $momento
 *
 * @property Aula $aula
 * @property CicloLectivo $ciclo
 * @property Comision $comision
 * @property Instituto $instituto
 * @property Users $userAsigna
 * @property Users $uModifica
 */
class EventoCalendar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evento_calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Aula', 'ID_Comision', 'ID_UModifica', 'ID_User_Asigna', 'ID_Instituto', 'ID_Ciclo'], 'integer'],
            [['Hora_ini', 'Hora_fin', 'momento'], 'safe'],
            [['dow'], 'string', 'max' => 20],
            [['ID_Aula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['ID_Aula' => 'ID']],
            [['ID_Ciclo'], 'exist', 'skipOnError' => true, 'targetClass' => CicloLectivo::className(), 'targetAttribute' => ['ID_Ciclo' => 'id']],
            [['ID_Comision'], 'exist', 'skipOnError' => true, 'targetClass' => Comision::className(), 'targetAttribute' => ['ID_Comision' => 'ID']],
            [['ID_Instituto'], 'exist', 'skipOnError' => true, 'targetClass' => Instituto::className(), 'targetAttribute' => ['ID_Instituto' => 'ID']],
            [['ID_User_Asigna'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_User_Asigna' => 'id']],
            [['ID_UModifica'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_UModifica' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ID_Aula' => 'Id  Aula',
            'ID_Comision' => 'Id  Comision',
            'ID_UModifica' => 'Id  Umodifica',
            'ID_User_Asigna' => 'Id  User  Asigna',
            'Hora_ini' => 'Hora Ini',
            'Hora_fin' => 'Hora Fin',
            'dow' => 'Dow',
            'ID_Instituto' => 'Id  Instituto',
            'ID_Ciclo' => 'Id  Ciclo',
            'momento' => 'Momento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAula()
    {
        return $this->hasOne(Aula::className(), ['ID' => 'ID_Aula']);
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
    public function getComision()
    {
        return $this->hasOne(Comision::className(), ['ID' => 'ID_Comision']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituto()
    {
        return $this->hasOne(Instituto::className(), ['ID' => 'ID_Instituto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAsigna()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_User_Asigna']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUModifica()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_UModifica']);
    }
}
