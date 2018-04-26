<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comision".
 *
 * @property int $ID_COMISION
 * @property int $ID_MATERIA
 * @property int $CARGA_HORARIA_SEMANAL
 * @property string $DESCRIPCION
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
            [['ID_MATERIA', 'CARGA_HORARIA_SEMANAL'], 'required'],
            [['ID_MATERIA', 'CARGA_HORARIA_SEMANAL'], 'integer'],
            [['DESCRIPCION'], 'string', 'max' => 30],
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
            'CARGA_HORARIA_SEMANAL' => 'Carga  Horaria  Semanal',
            'DESCRIPCION' => 'Descripcion',
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
