<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventoCalendar;

/**
 * EventoCalendarSearch represents the model behind the search form of `app\models\EventoCalendar`.
 */
class EventoCalendarSearch extends EventoCalendar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_Restri', 'ID_Comision', 'ID_Hora', 'ID_User_Asigna', 'ID_Dia'], 'integer'],
            [['Fecha_ini', 'Fecha_fin', 'title'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EventoCalendar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'ID_Restri' => $this->ID_Restri,
            'ID_Comision' => $this->ID_Comision,
            'ID_Hora' => $this->ID_Hora,
            'ID_User_Asigna' => $this->ID_User_Asigna,
            'ID_Dia' => $this->ID_Dia,
            'Fecha_ini' => $this->Fecha_ini,
            'Fecha_fin' => $this->Fecha_fin,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
