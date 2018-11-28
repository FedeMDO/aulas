<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sede".
 *
 * @property int $ID
 * @property int $ID_INSTITUCION
 * @property string $NOMBRE
 * @property string $CALLEYNUM
 * @property string $LOCALIDAD
 * @property string $DISPONIBLE_DESDE
 * @property string $DISPONIBLE_HASTA
 *
 * @property Edificio[] $edificios
 * @property InstitucionEducativa $iNSTITUCION
 */
class Sede extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sede';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_INSTITUCION', 'NOMBRE', 'CALLEYNUM', 'LOCALIDAD', 'DISPONIBLE_DESDE', 'DISPONIBLE_HASTA'], 'required'],
            [['ID_INSTITUCION'], 'integer'],
            [['DISPONIBLE_DESDE', 'DISPONIBLE_HASTA'], 'safe'],
            [['NOMBRE', 'LOCALIDAD'], 'string', 'max' => 50],
            [['CALLEYNUM'], 'string', 'max' => 100],
            [['ID_INSTITUCION'], 'exist', 'skipOnError' => true, 'targetClass' => InstitucionEducativa::className(), 'targetAttribute' => ['ID_INSTITUCION' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'Sede',
            'ID_INSTITUCION' => 'Id  Institucion',
            'NOMBRE' => 'Nombre Sede',
            'CALLEYNUM' => 'Calle',
            'LOCALIDAD' => 'Localidad',
            'DISPONIBLE_DESDE' => 'Disponible  Desde',
            'DISPONIBLE_HASTA' => 'Disponible  Hasta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEdificios()
    {
        return $this->hasMany(Edificio::className(), ['ID_SEDE' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getINSTITUCION()
    {
        return $this->hasOne(InstitucionEducativa::className(), ['ID' => 'ID_INSTITUCION']);
    }
}
