<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrera_materia".
 *
 * @property int $ID_MATERIA
 * @property int $ID_CARRERA
 *
 * @property Materia $mATERIA
 * @property Carrera $cARRERA
 */
class CarreraMateria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carrera_materia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_MATERIA', 'ID_CARRERA'], 'required'],
            [['ID_MATERIA', 'ID_CARRERA'], 'integer'],
            [['ID_MATERIA', 'ID_CARRERA'], 'unique', 'targetAttribute' => ['ID_MATERIA', 'ID_CARRERA']],
            [['ID_MATERIA'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['ID_MATERIA' => 'ID_MATERIA']],
            [['ID_CARRERA'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['ID_CARRERA' => 'ID_CARRERA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_MATERIA' => 'Id  Materia',
            'ID_CARRERA' => 'Id  Carrera',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMATERIA()
    {
        return $this->hasOne(Materia::className(), ['ID_MATERIA' => 'ID_MATERIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCARRERA()
    {
        return $this->hasOne(Carrera::className(), ['ID_CARRERA' => 'ID_CARRERA']);
    }
}
