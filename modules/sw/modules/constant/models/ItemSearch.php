<?php

namespace app\modules\sw\modules\constant\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ItemSearch extends Item
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'tech_name', 'value', 'created', 'updated'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tech_name', $this->tech_name])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
