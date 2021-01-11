<?php

namespace muhammetsaitcelik\content\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use muhammetsaitcelik\content\models\Company;

/**
 * CompanySearch represents the model behind the search form of `common\models\Company`.
 */
class CompanySearch extends Company
{
    public $car;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'car_id'], 'integer'],
            [['name', 'car', 'establishment', 'created_at', 'updated_at'], 'safe'],
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
        $query = Company::find();

        // add conditions that should always apply here
        $query->joinWith('car');

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
            'id' => $this->id,
            'establishment' => $this->establishment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'cars_of_company.car_name', $this->car]);

        return $dataProvider;
    }
}
