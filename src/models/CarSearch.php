<?php

namespace muhammetsaitcelik\content\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use muhammetsaitcelik\content\models\Cars;

/**
 * CarSearch represents the model behind the search form of `common\models\Cars`.
 */
class CarSearch extends Cars
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'model', 'year', 'price'], 'integer'],
            [['car_name'], 'safe'],
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
        $query = Cars::find();

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
            'id' => $this->id,
            'model' => $this->model,
            'year' => $this->year,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'car_name', $this->car_name]);

        return $dataProvider;
    }
}
