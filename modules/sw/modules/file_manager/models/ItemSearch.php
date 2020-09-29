<?php

namespace app\modules\sw\modules\file_manager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ItemSearch extends Item
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'tech_name', 'file', 'path', 'created', 'updated'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Item::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tech_name', $this->tech_name])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'path', $this->path]);

        return $dataProvider;
    }
}
