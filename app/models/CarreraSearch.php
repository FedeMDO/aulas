<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Carrera;

/**
 * CarreraSearch represents the model behind the search form of `app\models\Carrera`.
 */
class CarreraSearch extends Carrera
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ID_INSTITUTO'], 'integer'],
            [['NOMBRE'], 'safe'],
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
        $query = Carrera::find();

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
            'ID_INSTITUTO' => $this->ID_INSTITUTO,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE]);

        return $dataProvider;
    }
}
