<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Log;

/**
 * LogSearch represents the model behind the search form of `backend\models\Log`.
 */
class LogSearch extends Log
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_ip', 'item_type', 'item_id', 'action'], 'integer'],
            [['log_date'], 'date', 'format' => 'php:Y-m-d'],
            [['user'], 'string'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Log::find();

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
            'user_ip' => $this->user_ip,
            'item_type' => $this->item_type,
            'item_id' => $this->item_id,
            'action' => $this->action,
        ])
        ->andFilterWhere([
            '>=',
            'log_date',
            $this->log_date ? strtotime($this->log_date . ' 00:00:00') : null
        ])
        ->andFilterWhere([
            '<=',
            'log_date',
            $this->log_date ? strtotime($this->log_date . ' 23:59:59') : null
        ])
        ->andFilterWhere(['like', 'user', $this->user]);

        return $dataProvider;
    }
}
