<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aula;

/**
 * AulaSearch represents the model behind the search form of `app\models\Aula`.
 */
class AulaSearch extends Aula
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ID_EDIFICIO', 'PISO', 'CAPACIDAD'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Aula::find();

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
            'ID_EDIFICIO' => $this->ID_EDIFICIO,
            'PISO' => $this->PISO,
            'CAPACIDAD' => $this->CAPACIDAD,
        ]);

        return $dataProvider;
    }
}
