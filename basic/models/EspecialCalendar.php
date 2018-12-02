<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "especial_calendar".
 *
 * @property string $id
 * @property int $ID_Aula
 * @property string $dt_inicio
 * @property string $dt_fin
 * @property string $nombre
 * @property string $descripcion
 * @property string $momento
 * @property int $ID_UCrea
 * @property int $ID_UModifica
 *
 * @property Aula $aula
 * @property Users $uCrea
 * @property Users $uModifica
 */
class EspecialCalendar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'especial_calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Aula', 'ID_UCrea', 'ID_UModifica'], 'integer'],
            [['dt_inicio', 'dt_fin', 'momento'], 'safe'],
            [['nombre'], 'string', 'max' => 40],
            [['descripcion'], 'string', 'max' => 180],
            [['ID_Aula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['ID_Aula' => 'ID']],
            [['ID_UCrea'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['ID_UCrea' => 'id']],
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
            'dt_inicio' => 'Dt Inicio',
            'dt_fin' => 'Dt Fin',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'momento' => 'Momento',
            'ID_UCrea' => 'Id  Ucrea',
            'ID_UModifica' => 'Id  Umodifica',
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
    public function getUCrea()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_UCrea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUModifica()
    {
        return $this->hasOne(Users::className(), ['id' => 'ID_UModifica']);
    }
}
