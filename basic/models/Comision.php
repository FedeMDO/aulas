<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comision".
 *
 * @property int $ID_COMISION
 * @property int $ID_MATERIA
 * @property int $NUMERO
 *
 * @property AgendaAula[] $agendaAulas
 * @property Materia $mATERIA
 */
class Comision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_MATERIA', 'NUMERO'], 'required'],
            [['ID_MATERIA', 'NUMERO'], 'integer'],
            [['ID_MATERIA'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['ID_MATERIA' => 'ID_MATERIA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_COMISION' => 'Id  Comision',
            'ID_MATERIA' => 'Id  Materia',
            'NUMERO' => 'Numero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAulas()
    {
        return $this->hasMany(AgendaAula::className(), ['ID_COMISION' => 'ID_COMISION']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMATERIA()
    {
        return $this->hasOne(Materia::className(), ['ID_MATERIA' => 'ID_MATERIA']);
    }
}
