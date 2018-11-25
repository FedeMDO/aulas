<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property int $ID
 * @property int $ID_INSTITUTO
 * @property string $NOMBRE
 *
 * @property Instituto $iNSTITUTO
 * @property Materia[] $materias
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_INSTITUTO', 'NOMBRE'], 'required'],
            [['ID_INSTITUTO'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 40],
            [['ID_INSTITUTO'], 'exist', 'skipOnError' => true, 'targetClass' => Instituto::className(), 'targetAttribute' => ['ID_INSTITUTO' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_INSTITUTO' => 'Instituto',
            'NOMBRE' => 'NOMBRE',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getINSTITUTO()
    {
        return $this->hasOne(Instituto::className(), ['ID' => 'ID_INSTITUTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterias()
    {
        return $this->hasMany(Materia::className(), ['ID_Carrera' => 'ID']);
    }
}
