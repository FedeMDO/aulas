<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property int $ID_CARRERA
 * @property int $ID_INSTITUTO
 * @property string $NOMBRE
 *
 * @property Instituto $iNSTITUTO
 * @property CarreraMateria[] $carreraMaterias
 * @property Materia[] $mATERIAs
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_INSTITUTO', 'NOMBRE'], 'required'],
            [['ID_INSTITUTO'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 40],
            [['ID_INSTITUTO'], 'exist', 'skipOnError' => true, 'targetClass' => Instituto::className(), 'targetAttribute' => ['ID_INSTITUTO' => 'ID_INSTITUTO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_CARRERA' => 'Id  Carrera',
            'ID_INSTITUTO' => 'Id  Instituto',
            'NOMBRE' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getINSTITUTO()
    {
        return $this->hasOne(Instituto::className(), ['ID_INSTITUTO' => 'ID_INSTITUTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarreraMaterias()
    {
        return $this->hasMany(CarreraMateria::className(), ['ID_CARRERA' => 'ID_CARRERA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMATERIAs()
    {
        return $this->hasMany(Materia::className(), ['ID_MATERIA' => 'ID_MATERIA'])->viaTable('carrera_materia', ['ID_CARRERA' => 'ID_CARRERA']);
    }
}
