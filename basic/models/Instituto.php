<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instituto".
 *
 * @property int $ID
 * @property int $ID_INSTITUCION
 * @property string $NOMBRE
 * @property string $COLOR_HEXA
 *
 * @property Carrera[] $carreras
 * @property InstitucionEducativa $iNSTITUCION
 * @property Users[] $users
 */
class Instituto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instituto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_INSTITUCION', 'NOMBRE', 'COLOR_HEXA'], 'required'],
            [['ID_INSTITUCION'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 50],
            [['COLOR_HEXA'], 'string', 'max' => 6],
            [['ID_INSTITUCION'], 'exist', 'skipOnError' => true, 'targetClass' => InstitucionEducativa::className(), 'targetAttribute' => ['ID_INSTITUCION' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_INSTITUCION' => 'Id  Institucion',
            'NOMBRE' => 'Instituto',
            'COLOR_HEXA' => 'Color',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarreras()
    {
        return $this->hasMany(Carrera::className(), ['ID_INSTITUTO' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getINSTITUCION()
    {
        return $this->hasOne(InstitucionEducativa::className(), ['ID' => 'ID_INSTITUCION']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['ID_INSTITUTO' => 'ID']);
    }
}
