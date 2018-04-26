<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property int $ID_MATERIA
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 *
 * @property CarreraMateria[] $carreraMaterias
 * @property Carrera[] $cARRERAs
 * @property Comision[] $comisions
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE', 'DESCRIPCION'], 'required'],
            [['NOMBRE'], 'string', 'max' => 40],
            [['DESCRIPCION'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_MATERIA' => 'Id  Materia',
            'NOMBRE' => 'Nombre',
            'DESCRIPCION' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarreraMaterias()
    {
        return $this->hasMany(CarreraMateria::className(), ['ID_MATERIA' => 'ID_MATERIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCARRERAs()
    {
        return $this->hasMany(Carrera::className(), ['ID_CARRERA' => 'ID_CARRERA'])->viaTable('carrera_materia', ['ID_MATERIA' => 'ID_MATERIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComisions()
    {
        return $this->hasMany(Comision::className(), ['ID_MATERIA' => 'ID_MATERIA']);
    }
}
