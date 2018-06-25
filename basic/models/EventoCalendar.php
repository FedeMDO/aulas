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
 * @property string $Fecha_fin
 * @property string $title
 *
 * @property RestriCalendar $restri
 * @property Comision $comision
 * @property Hora $hora
 * @property Users $userAsigna
 * @property DiaSemana $dia
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
            [['ID_Restri', 'ID_Comision', 'ID_Hora', 'ID_User_Asigna', 'ID_Dia', 'Fecha_ini', 'Fecha_fin', 'title'], 'required'],
            [['ID_Restri', 'ID_Comision', 'ID_Hora', 'ID_User_Asigna', 'ID_Dia'], 'integer'],
            [['Fecha_ini', 'Fecha_fin'], 'safe'],
            [['title'], 'string', 'max' => 40],
            [['ID_Restri'], 'exist', 'skipOnError' => true, 'targetClass' => RestriCalendar::className(), 'targetAttribute' => ['ID_Restri' => 'ID']],
            [['ID_Comision'], 'exist', 'skipOnError' => true, 'targetClass' => Comision::className(), 'targetAttribute' => ['ID_Comision' => 'ID']],
            [['ID_Hora'], 'exist', 'skipOnError' => true, 'targetClass' => Hora::className(), 'targetAttribute' => ['ID_Hora' => 'ID']],
            [['ID_User_Asigna'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_User_Asigna' => 'id']],
            [['ID_Dia'], 'exist', 'skipOnError' => true, 'targetClass' => DiaSemana::className(), 'targetAttribute' => ['ID_Dia' => 'ID']],
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
            'ID_Comision' => 'Id  Comision',
            'ID_Hora' => 'Id  Hora',
            'ID_User_Asigna' => 'Id  User  Asigna',
            'ID_Dia' => 'Id  Dia',
            'Fecha_ini' => 'Fecha Ini',
            'Fecha_fin' => 'Fecha Fin',
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
}
