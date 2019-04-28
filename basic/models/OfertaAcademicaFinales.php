<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oferta_academica_finales".
 *
 * @property string $ID
 * @property string $Carrera
 * @property string $Final
 * @property string $Descripcion
 * @property string $Fecha
 * @property string $Inicio
 * @property string $Fin
 * @property string $Aula
 * @property string $Edificio
 * @property string $Sede
 */
class OfertaAcademicaFinales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oferta_academica_finales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['Carrera', 'Aula', 'Edificio', 'Sede'], 'required'],
            [['Carrera', 'Aula', 'Edificio'], 'string', 'max' => 40],
            [['Final'], 'string', 'max' => 100],
            [['Descripcion'], 'string', 'max' => 180],
            [['Fecha'], 'string', 'max' => 10],
            [['Inicio', 'Fin'], 'string', 'max' => 7],
            [['Sede'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Carrera' => 'Carrera',
            'Final' => 'Final',
            'Descripcion' => 'Descripcion',
            'Fecha' => 'Fecha',
            'Inicio' => 'Inicio',
            'Fin' => 'Fin',
            'Aula' => 'Aula',
            'Edificio' => 'Edificio',
            'Sede' => 'Sede',
        ];
    }
}
