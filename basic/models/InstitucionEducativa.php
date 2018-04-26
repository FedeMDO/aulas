<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "institucion_educativa".
 *
 * @property int $ID_INSTITUCION
 * @property string $NOMBRE
 *
 * @property Instituto[] $institutos
 * @property Sede[] $sedes
 */
class InstitucionEducativa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'institucion_educativa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE'], 'required'],
            [['NOMBRE'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_INSTITUCION' => 'Id  Institucion',
            'NOMBRE' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutos()
    {
        return $this->hasMany(Instituto::className(), ['ID_INSTITUCION' => 'ID_INSTITUCION']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSedes()
    {
        return $this->hasMany(Sede::className(), ['ID_INSTITUCION' => 'ID_INSTITUCION']);
    }
}
