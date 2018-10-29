<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restri_calendar".
 *
 * @property string $id
 * @property int $ID_Aula
 * @property int $ID_User_Asigna
 * @property string $Hora_ini
 * @property string $Hora_fin
 * @property string $dow
 * @property int $ID_Instituto
 * @property int $ID_Ciclo
 * @property string $momento
 *
 * @property Aula $aula
 * @property Users $userAsigna
 * @property Instituto $instituto
 * @property CicloLectivo $ciclo
 */
class RestriCalendar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'restri_calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'ID_Aula', 'ID_User_Asigna', 'ID_Instituto', 'ID_Ciclo'], 'integer'],
            [['Hora_ini', 'Hora_fin', 'momento'], 'safe'],
            [['dow'], 'string', 'max' => 20],
            [['id'], 'unique'],
            [['ID_Aula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['ID_Aula' => 'ID']],
            [['ID_User_Asigna'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_User_Asigna' => 'id']],
            [['ID_Instituto'], 'exist', 'skipOnError' => true, 'targetClass' => Instituto::className(), 'targetAttribute' => ['ID_Instituto' => 'ID']],
            [['ID_Ciclo'], 'exist', 'skipOnError' => true, 'targetClass' => CicloLectivo::className(), 'targetAttribute' => ['ID_Ciclo' => 'id']],
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
    public function getUserAsigna()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_User_Asigna']);
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
    public function getCiclo()
    {
        return $this->hasOne(CicloLectivo::className(), ['id' => 'ID_Ciclo']);
    }
}
