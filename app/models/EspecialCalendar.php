<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "especial_calendar".
 *
 * @property string $id
 * @property int $ID_Aula
 * @property string $inicio
 * @property string $fin
 * @property string $nombre
 * @property string $descripcion
 * @property string $momento
 * @property int $ID_UCrea
 * @property int $ID_UModifica
 * @property int $ID_Carrera
 * @property int $EXAMEN_FINAL
 * @property int $ID_Instituto
 * @property int $ID_Materia
 * @property Aula $aula
 * @property Carrera $carrera
 * @property Materia $materia
 * @property Instituto $instituto
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
            [['ID_Aula', 'ID_UCrea', 'ID_UModifica', 'ID_Carrera'], 'integer'],
            [['momento', 'EXAMEN_FINAL'], 'safe'],
            ['nombre', 'required'],
            [['inicio', 'fin'], 'string', 'max' => 30],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 180],
            [['ID_Aula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['ID_Aula' => 'ID']],
            [['ID_Carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['ID_Carrera' => 'ID']],
            [['ID_Instituto'], 'exist', 'skipOnError' => true, 'targetClass' => Instituto::className(), 'targetAttribute' => ['ID_Instituto' => 'ID']],
            [['ID_Materia'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['ID_Materia' => 'ID']],
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
            'ID_Aula' => 'Aula',
            'EXAMEN_FINAL' => 'Es examen final',
            'inicio' => 'Inicio',
            'fin' => 'Fin',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'momento' => 'Momento',
            'ID_UCrea' => 'Creador',
            'ID_UModifica' => 'Ultimo en modificar',
            'ID_Materia' => 'Materia',
            'ID_Instituto' => 'Instituto',
            'ID_Carrera' => 'Carrera',
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
    public function getInstituto()
    {
        return $this->hasOne(Instituto::className(), ['ID' => 'ID_Instituto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMateria()
    {
        return $this->hasOne(Materia::className(), ['ID' => 'ID_Materia']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrera()
    {
        return $this->hasOne(Carrera::className(), ['ID' => 'ID_Carrera']);
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
