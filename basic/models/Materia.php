<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property int $ID
 * @property string $NOMBRE
 * @property string $DESC_CORTA
 * @property int $ID_Carrera
 * @property int $anio
 * @property string $COD_MATERIA
 * @property Comision[] $comisions
 * @property Carrera $carrera
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
            [['ID_Carrera', 'anio'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 40],
            [['DESC_CORTA'], 'string', 'max' => 20],
            [['COD_MATERIA'], 'string', 'max' => 20],
            [['ID_Carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['ID_Carrera' => 'ID']],
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
            'ID_Carrera' => 'Id  Carrera',
            'anio' => 'Anio',
            'COD_MATERIA' => 'Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComisions()
    {
        return $this->hasMany(Comision::className(), ['ID_MATERIA' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrera()
    {
        return $this->hasOne(Carrera::className(), ['ID' => 'ID_Carrera']);
    }
    public function getMateriaCodigo($result, $result1) {
        $nuevo = array();
        foreach ($result as $key => $value) {
            foreach ($result1 as $key1 => $value1) {
                if ($key == $key1) {
                    $nombre = $result[$key];
                    $codigo = $result1[$key1];
                    $concatenar = $nombre . ' (' . $codigo . ')';
                    array_push($nuevo, $concatenar);
                }
            }
        }
        return $nuevo;
    }
    
}
