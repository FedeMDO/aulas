<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recurso".
 *
 * @property int $ID
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 *
 * @property AulaRecurso[] $aulaRecursos
 * @property Aula[] $aULAs
 */
class Recurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOMBRE'], 'required'],
            [['NOMBRE'], 'string', 'max' => 100],
            [['DESCRIPCION'], 'string', 'max' => 120],
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
            'DESCRIPCION' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaRecursos()
    {
        return $this->hasMany(AulaRecurso::className(), ['ID_RECURSO' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAULAs()
    {
        return $this->hasMany(Aula::className(), ['ID' => 'ID_AULA'])->viaTable('aula_recurso', ['ID_RECURSO' => 'ID']);
    }
}
