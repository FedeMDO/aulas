<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sede;

/**
 * SedeSearch represents the model behind the search form of `app\models\Sede`.
 */
class SedeSearch extends Sede
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ID_INSTITUCION'], 'integer'],
            [['NOMBRE', 'CALLEYNUM', 'LOCALIDAD', 'DISPONIBLE_DESDE', 'DISPONIBLE_HASTA'], 'safe'],
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
        $query = Sede::find();

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
            'DISPONIBLE_DESDE' => $this->DISPONIBLE_DESDE,
            'DISPONIBLE_HASTA' => $this->DISPONIBLE_HASTA,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'CALLEYNUM', $this->CALLEYNUM])
            ->andFilterWhere(['like', 'LOCALIDAD', $this->LOCALIDAD]);

        return $dataProvider;
    }
}
