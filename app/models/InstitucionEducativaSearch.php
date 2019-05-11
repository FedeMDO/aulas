<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InstitucionEducativa;

/**
 * InstitucionEducativaSearch represents the model behind the search form of `app\models\InstitucionEducativa`.
 */
class InstitucionEducativaSearch extends InstitucionEducativa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_INSTITUCION'], 'integer'],
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
        $query = InstitucionEducativa::find();

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
            'ID_INSTITUCION' => $this->ID_INSTITUCION,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE]);

        return $dataProvider;
    }
}
