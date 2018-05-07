<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comision;

/**
 * ComisionSearch represents the model behind the search form of `app\models\Comision`.
 */
class ComisionSearch extends Comision
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_COMISION', 'ID_MATERIA', 'CARGA_HORARIA_SEMANAL'], 'integer'],
            [['DESCRIPCION'], 'safe'],
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
        $query = Comision::find();

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
            'ID_COMISION' => $this->ID_COMISION,
            'ID_MATERIA' => $this->ID_MATERIA,
            'CARGA_HORARIA_SEMANAL' => $this->CARGA_HORARIA_SEMANAL,
        ]);

        $query->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION]);

        return $dataProvider;
    }
}
