<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aula_recurso".
 *
 * @property int $ID_RECURSO
 * @property int $ID_AULA
 *
 * @property Recurso $rECURSO
 * @property Aula $aULA
 */
class AulaRecurso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aula_recurso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_RECURSO', 'ID_AULA'], 'required'],
            [['ID_RECURSO', 'ID_AULA'], 'integer'],
            [['ID_RECURSO', 'ID_AULA'], 'unique', 'targetAttribute' => ['ID_RECURSO', 'ID_AULA']],
            [['ID_RECURSO'], 'exist', 'skipOnError' => true, 'targetClass' => Recurso::className(), 'targetAttribute' => ['ID_RECURSO' => 'ID']],
            [['ID_AULA'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['ID_AULA' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_RECURSO' => 'Id  Recurso',
            'ID_AULA' => 'Id  Aula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRECURSO()
    {
        return $this->hasOne(Recurso::className(), ['ID' => 'ID_RECURSO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAULA()
    {
        return $this->hasOne(Aula::className(), ['ID' => 'ID_AULA']);
    }
}
