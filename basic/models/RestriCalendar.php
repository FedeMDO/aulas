<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restri_calendar".
 *
 * @property int $ID
 * @property int $ID_Aula
 * @property int $ID_Instituto_Recibe
 * @property int $ID_Tipo_Repeticion
 * @property int $ID_User_Recibe
 * @property string $Fecha_ini
 * @property string $Hora_ini
 * @property string $Hora_fin
 * @property string $dow
 * @property string $Periodo_Academico
 *
 * @property EventoCalendar[] $eventoCalendars
 * @property Aula $aula
 * @property Instituto $institutoRecibe
 * @property TipoRepeticion $tipoRepeticion
 * @property Users $userRecibe
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
            [['ID_Aula', 'ID_Instituto_Recibe', 'ID_Tipo_Repeticion', 'ID_User_Recibe', 'Fecha_ini', 'Hora_ini', 'Hora_fin', 'Periodo_Academico'], 'required'],
            [['ID_Aula', 'ID_Instituto_Recibe', 'ID_Tipo_Repeticion', 'ID_User_Recibe'], 'integer'],
            [['Fecha_ini', 'Hora_ini', 'Hora_fin'], 'safe'],
            [['dow'], 'string', 'max' => 13],
            [['Periodo_Academico'], 'string', 'max' => 50],
            [['ID_Aula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['ID_Aula' => 'ID']],
            [['ID_Instituto_Recibe'], 'exist', 'skipOnError' => true, 'targetClass' => Instituto::className(), 'targetAttribute' => ['ID_Instituto_Recibe' => 'ID']],
            [['ID_Tipo_Repeticion'], 'exist', 'skipOnError' => true, 'targetClass' => TipoRepeticion::className(), 'targetAttribute' => ['ID_Tipo_Repeticion' => 'ID']],
            [['ID_User_Recibe'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_User_Recibe' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_Aula' => 'Id  Aula',
            'ID_Instituto_Recibe' => 'Id  Instituto  Recibe',
            'ID_Tipo_Repeticion' => 'Id  Tipo  Repeticion',
            'ID_User_Recibe' => 'Id  User  Recibe',
            'Fecha_ini' => 'Fecha Ini',
            'Hora_ini' => 'Hora Ini',
            'Hora_fin' => 'Hora Fin',
            'dow' => 'Dow',
            'Periodo_Academico' => 'Periodo  Academico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoCalendars()
    {
        return $this->hasMany(EventoCalendar::className(), ['ID_Restri' => 'ID']);
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
    public function getInstitutoRecibe()
    {
        return $this->hasOne(Instituto::className(), ['ID' => 'ID_Instituto_Recibe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoRepeticion()
    {
        return $this->hasOne(TipoRepeticion::className(), ['ID' => 'ID_Tipo_Repeticion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRecibe()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_User_Recibe']);
    }
}
