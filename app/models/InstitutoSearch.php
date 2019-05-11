<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Instituto;

/**
 * InstitutoSearch represents the model behind the search form of `app\models\Instituto`.
 */
class InstitutoSearch extends Instituto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ID_INSTITUCION'], 'integer'],
            [['NOMBRE', 'COLOR_HEXA'], 'safe'],
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
        $query = Instituto::find();

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
            'ID_INSTITUCION' => $this->ID_INSTITUCION,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'COLOR_HEXA', $this->COLOR_HEXA]);

        return $dataProvider;
    }
}
