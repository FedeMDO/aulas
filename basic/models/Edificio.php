<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "edificio".
 *
 * @property int $ID
 * @property int $ID_SEDE
 * @property string $NOMBRE
 * @property int $CANTIDAD_AULAS
 *
 * @property Aula[] $aulas
 * @property Sede $sEDE
 */
class Edificio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edificio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_SEDE', 'NOMBRE'], 'required'],
            [['ID_SEDE', 'CANTIDAD_AULAS'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 40],
            [['ID_SEDE'], 'exist', 'skipOnError' => true, 'targetClass' => Sede::className(), 'targetAttribute' => ['ID_SEDE' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_SEDE' => 'Id  Sede',
            'NOMBRE' => 'Edificio',
            'CANTIDAD_AULAS' => 'Cantidad  Aulas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulas()
    {
        return $this->hasMany(Aula::className(), ['ID_EDIFICIO' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSEDE()
    {
        return $this->hasOne(Sede::className(), ['ID' => 'ID_SEDE']);
    }
}
