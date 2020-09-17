<?php

namespace app\modules\sw\modules\lang\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sw\modules\lang\models\LangTranslate;

/**
 * LangTranslateSearch represents the model behind the search form of `app\modules\sw\modules\lang\models\LangTranslate`.
 */
class LangTranslateSearch extends LangTranslate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['lang_code', 'key', 'value'], 'safe'],
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
        $query = LangTranslate::find();

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
        ]);

        $query->andFilterWhere(['like', 'lang_code', $this->lang_code])
            ->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
