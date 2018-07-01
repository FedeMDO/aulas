<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evento_calendar".
 *
 * @property int $ID
 * @property int $ID_Restri
 * @property int $ID_Comision
 * @property int $ID_Hora
 * @property int $ID_User_Asigna
 * @property int $ID_Dia
 * @property string $Fecha_ini
 * @property int $Hora_ini
 * @property int $Hora_fin
 * @property string $title
 *
 * @property RestriCalendar $restri
 * @property Comision $comision
 * @property Hora $hora
 * @property Users $userAsigna
 * @property DiaSemana $dia
 * @property Hora $horaFin
 * @property Hora $horaIni
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
            [['ID_Restri', 'ID_Comision', 'ID_Hora', 'ID_User_Asigna', 'ID_Dia', 'Hora_ini', 'Hora_fin'], 'integer'],
            [['ID_Comision', 'ID_User_Asigna', 'Fecha_ini', 'title'], 'required'],
            [['Fecha_ini'], 'safe'],
            [['title'], 'string', 'max' => 40],
            [['ID_Restri'], 'exist', 'skipOnError' => true, 'targetClass' => RestriCalendar::className(), 'targetAttribute' => ['ID_Restri' => 'ID']],
            [['ID_Comision'], 'exist', 'skipOnError' => true, 'targetClass' => Comision::className(), 'targetAttribute' => ['ID_Comision' => 'ID']],
            [['ID_Hora'], 'exist', 'skipOnError' => true, 'targetClass' => Hora::className(), 'targetAttribute' => ['ID_Hora' => 'ID']],
            [['ID_User_Asigna'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_User_Asigna' => 'id']],
            [['ID_Dia'], 'exist', 'skipOnError' => true, 'targetClass' => DiaSemana::className(), 'targetAttribute' => ['ID_Dia' => 'ID']],
            [['Hora_fin'], 'exist', 'skipOnError' => true, 'targetClass' => Hora::className(), 'targetAttribute' => ['Hora_fin' => 'ID']],
            [['Hora_ini'], 'exist', 'skipOnError' => true, 'targetClass' => Hora::className(), 'targetAttribute' => ['Hora_ini' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_Restri' => 'Id  Restri',
            'ID_Comision' => 'COMISION',
            'ID_Hora' => 'Id  Hora',
            'ID_User_Asigna' => 'Id  User  Asigna',
            'ID_Dia' => 'Id  Dia',
            'Fecha_ini' => 'Fecha Ini',
            'Hora_ini' => 'HORA DE INICIO',
            'Hora_fin' => 'HORA DE FIN',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestri()
    {
        return $this->hasOne(RestriCalendar::className(), ['ID' => 'ID_Restri']);
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
    public function getHora()
    {
        return $this->hasOne(Hora::className(), ['ID' => 'ID_Hora']);
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
    public function getDia()
    {
        return $this->hasOne(DiaSemana::className(), ['ID' => 'ID_Dia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHoraFin()
    {
        return $this->hasOne(Hora::className(), ['ID' => 'Hora_fin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHoraIni()
    {
        return $this->hasOne(Hora::className(), ['ID' => 'Hora_ini']);
    }
}
