<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comision".
 *
 * @property int $ID
 * @property string $NOMBRE
 * @property int $ID_MATERIA
 * @property int $CARGA_HORARIA_SEMANAL
 *
 * @property AgendaAsigComision[] $agendaAsigComisions
 * @property Materia $mATERIA
 */
class Comision extends \yii\db\ActiveRecord
{
    public $cant_comisiones;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comision';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOMBRE', 'ID_MATERIA', 'CARGA_HORARIA_SEMANAL'], 'required'],
            [['ID_MATERIA', 'CARGA_HORARIA_SEMANAL'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 40],
            [['ID_MATERIA'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['ID_MATERIA' => 'ID']],
            [['cant_comisiones'],'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NOMBRE' => ' Nombre Comision',
            'ID_MATERIA' => 'Materia',
            'CARGA_HORARIA_SEMANAL' => 'Carga  Horaria  Semanal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaAsigComisions()
    {
        return $this->hasMany(AgendaAsigComision::className(), ['ID_COMISION' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMATERIA()
    {
        return $this->hasOne(Materia::className(), ['ID' => 'ID_MATERIA']);
    }
}
