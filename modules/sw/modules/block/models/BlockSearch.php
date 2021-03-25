<?php

namespace sw\modules\block\models;

use yii\data\ActiveDataProvider;

class BlockSearch extends Block
{
    public $page = 0;
    public $sort = null;
    public $sortBy = null;

    public function rules()
    {
        return [
            [
                $this->attributes, 'safe', 'skipOnEmpty' => true,
            ],
            [
                ['page'], 'integer', 'skipOnError' => true,
            ],
            [
                ['page'], 'default', 'value' => 0,
            ],
            [
                ['sort'], 'boolean', 'skipOnEmpty' => true,
            ],
            [
                ['sort'], 'default', 'value' => false,
            ],
            [
                ['sortBy'], 'string', 'skipOnEmpty' => true,
            ],
        ];
    }
    public function search($params = [])
    {
        $query = Block::find()
            ->with(['template', 'item']);
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

        // grid filtering conditions
        $query->andFilterWhere([
            'block_id' => $this->block_id,
            'template_id' => $this->template_id,
        ]);
/*
        $query->andFilterWhere(['like', 'tech_name', $this->tech_name])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text]);
*/
        $dataProvider->setPagination([
            'page' => 0,
            'pageSize' => 30,
        ]);
        return $dataProvider;
    }
}