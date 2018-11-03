<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property int $ID
 * @property string $NOMBRE
 * @property string $DESC_CORTA
 * @property int $anio
 *
 * @property CarreraMateria[] $carreraMaterias
 * @property Carrera[] $cARRERAs
 * @property Comision[] $comisions
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOMBRE', 'DESC_CORTA'], 'required'],
            [['anio'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 40],
            [['DESC_CORTA'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NOMBRE' => 'Nombre',
            'DESC_CORTA' => 'Desc  Corta',
            'anio' => 'Anio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarreraMaterias()
    {
        return $this->hasMany(CarreraMateria::className(), ['ID_MATERIA' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCARRERAs()
    {
        return $this->hasMany(Carrera::className(), ['ID' => 'ID_CARRERA'])->viaTable('carrera_materia', ['ID_MATERIA' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComisions()
    {
        return $this->hasMany(Comision::className(), ['ID_MATERIA' => 'ID']);
    }
}
