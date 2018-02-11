<?php

use yii\web\View;
use yii\data\ActiveDataProvider;
use backend\models\search\LogSearch;

/**
 * @var View $this
 * @var LogSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 * @var array $itemTypes
 * @var array $itemActions
 */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_list', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'itemTypes' => $itemTypes,
    'itemActions' => $itemActions,
]);
