<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oferta_academica".
 *
 * @property int $id
 * @property string $Carrera
 * @property int $Anio
 * @property string $Materia
 * @property string $Comision
 * @property string $Dia
 * @property string $HoraInicio
 * @property string $HoraFin
 * @property string $Edificio
 * @property string $Sede
 * @property string $Aula
 * @property int $Ciclo
 */
class OfertaAcademica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oferta_academica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Anio', 'Comision', 'Ciclo'], 'integer'],
            [['Carrera', 'Materia', 'Edificio', 'Sede', 'Aula'], 'required'],
            [['Carrera', 'Materia', 'Edificio', 'Aula'], 'string', 'max' => 40],
            [['Dia'], 'string', 'max' => 20],
            [['HoraInicio', 'HoraFin'], 'string', 'max' => 7],
            [['Sede'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Carrera' => 'Carrera',
            'Anio' => 'Anio',
            'Materia' => 'Materia',
            'Comision' => 'Comision',
            'Dia' => 'Dia',
            'HoraInicio' => 'Hora Inicio',
            'HoraFin' => 'Hora Fin',
            'Edificio' => 'Edificio',
            'Sede' => 'Sede',
            'Aula' => 'Aula',
            'Ciclo' => 'Ciclo',
        ];
    }
}
