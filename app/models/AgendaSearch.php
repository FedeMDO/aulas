<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgendaAsigHoras;

/**
 * AgendaSearch represents the model behind the search form of `app\models\AgendaAsigHoras`.
 */
class AgendaSearch extends AgendaAsigHoras
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_HORA', 'ID_DIA', 'ID_AULA', 'ID_USER_ASIGNA', 'ID_USER_RECIBE', 'COMISION_ASIGNADA'], 'integer'],
            [['PERIODO_LECTIVO'], 'safe'],
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
        $query = AgendaAsigHoras::find();

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
            'ID_HORA' => $this->ID_HORA,
            'ID_DIA' => $this->ID_DIA,
            'ID_AULA' => $this->ID_AULA,
            'ID_USER_ASIGNA' => $this->ID_USER_ASIGNA,
            'ID_USER_RECIBE' => $this->ID_USER_RECIBE,
            'COMISION_ASIGNADA' => $this->COMISION_ASIGNADA,
        ]);

        $query->andFilterWhere(['like', 'PERIODO_LECTIVO', $this->PERIODO_LECTIVO]);

        return $dataProvider;
    }
}
