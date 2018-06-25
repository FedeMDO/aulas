<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_repeticion".
 *
 * @property int $ID
 * @property string $Tipo
 *
 * @property RestriCalendar[] $restriCalendars
 */
class TipoRepeticion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_repeticion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tipo'], 'required'],
            [['Tipo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestriCalendars()
    {
        return $this->hasMany(RestriCalendar::className(), ['ID_Tipo_Repeticion' => 'ID']);
    }
}
