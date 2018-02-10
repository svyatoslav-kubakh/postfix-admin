<?php

use yii\web\View;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use kartik\date\DatePicker;
use backend\models\Log;
use backend\models\search\LogSearch;
use backend\components\grid\ActionColumn;

/**
 * @var View $this
 * @var LogSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'log_date',
                'format' => 'datetime',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'log_date',
                    'size' => 'xs',
                    'separator' => ' - ',
                    'pluginOptions' => ['format' => 'yyyy-mm-dd', 'size' => 'xs']
                ]),
            ],
            'user',
            'user_ip',
            'item_type',
            'item_id',
            'action',
            [
                'class' => ActionColumn::class,
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
