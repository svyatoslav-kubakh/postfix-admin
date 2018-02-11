<?php
namespace backend\models\search;

use backend\models\User;
use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public function rules()
    {
        return [
            [['username'], 'string'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params = [])
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort = [
            'defaultOrder' => [
                'username' => SORT_ASC,
            ],
        ];
        if (!$this->load($params) || !$this->validate()) {
            return $dataProvider;
        }
        $query->andWhere(['like', 'username', $this->username]);
        return $dataProvider;
    }
}
