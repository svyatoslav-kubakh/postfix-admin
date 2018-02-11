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
            [['id', 'item_type', 'item_id', 'action'], 'integer'],
            [['log_date'], 'date', 'format' => 'php:Y-m-d'],
            [['user_ip'], 'ip'],
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
            'sort'=> [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_ip' => $this->user_ip ? ip2long($this->user_ip) : null,
            'item_type' => $this->item_type,
            'item_id' => $this->item_id,
            'action' => $this->action,
            'user' => $this->user,
        ]);
        if ($this->log_date) {
            $query->andFilterWhere([
                'BETWEEN',
                'log_date',
                strtotime($this->log_date . ' 00:00:00'),
                strtotime($this->log_date . ' 23:59:59'),
            ]);
        }

        return $dataProvider;
    }
}
