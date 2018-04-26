<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instituto".
 *
 * @property int $ID_INSTITUTO
 * @property int $ID_INSTITUCION
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 *
 * @property Carrera[] $carreras
 * @property InstitucionEducativa $iNSTITUCION
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
            [['ID_INSTITUCION', 'NOMBRE', 'DESCRIPCION'], 'required'],
            [['ID_INSTITUCION'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 40],
            [['DESCRIPCION'], 'string', 'max' => 50],
            [['ID_INSTITUCION'], 'exist', 'skipOnError' => true, 'targetClass' => InstitucionEducativa::className(), 'targetAttribute' => ['ID_INSTITUCION' => 'ID_INSTITUCION']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_INSTITUTO' => 'Id  Instituto',
            'ID_INSTITUCION' => 'Id  Institucion',
            'NOMBRE' => 'Nombre',
            'DESCRIPCION' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarreras()
    {
        return $this->hasMany(Carrera::className(), ['ID_INSTITUTO' => 'ID_INSTITUTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getINSTITUCION()
    {
        return $this->hasOne(InstitucionEducativa::className(), ['ID_INSTITUCION' => 'ID_INSTITUCION']);
    }
}
