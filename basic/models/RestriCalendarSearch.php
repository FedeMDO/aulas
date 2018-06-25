<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RestriCalendar;

/**
 * RestriCalendarSearch represents the model behind the search form of `app\models\RestriCalendar`.
 */
class RestriCalendarSearch extends RestriCalendar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_Aula', 'ID_Instituto_Recibe', 'ID_Tipo_Repeticion', 'ID_User_Recibe'], 'integer'],
            [['Fecha_ini', 'Fecha_fin', 'Periodo_Academico'], 'safe'],
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
        $query = RestriCalendar::find();

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
            'ID_Aula' => $this->ID_Aula,
            'ID_Instituto_Recibe' => $this->ID_Instituto_Recibe,
            'ID_Tipo_Repeticion' => $this->ID_Tipo_Repeticion,
            'ID_User_Recibe' => $this->ID_User_Recibe,
            'Fecha_ini' => $this->Fecha_ini,
            'Fecha_fin' => $this->Fecha_fin,
        ]);

        $query->andFilterWhere(['like', 'Periodo_Academico', $this->Periodo_Academico]);

        return $dataProvider;
    }
}
