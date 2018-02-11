<?php

use yii\web\View;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use kartik\date\DatePicker;
use backend\models\Log;
use backend\models\search\LogSearch;
use backend\components\grid\ActionColumn;
use backend\components\grid\EnumColumn;

/**
 * @var View $this
 * @var LogSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 * @var array $itemTypes
 * @var array $itemActions
 */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'log_date',
                'value' => function (Log $log) {
                    return
                        Html::tag('span', '', ['class' => "glyphicon glyphicon-time"]) . ' ' .
                        date('Y-m-d H:i', $log->log_date);
                },
                'filter' => DatePicker::widget([
                    'type' => DatePicker::TYPE_INPUT,
                    'model' => $searchModel,
                    'attribute' => 'log_date',
                    'pluginOptions' => ['format' => 'yyyy-mm-dd']
                ]),
                'enableSorting' => false,
                'format' => 'raw',
            ],
            [
                'class' => EnumColumn::class,
                'attribute' => 'item_type',
                'value' => function (Log $model) use ($itemTypes) {
                    if ($itemTypes[$model->item_type]) {
                        return Html::a($itemTypes[$model->item_type], ['/' . $itemTypes[$model->item_type]]);
                    }
                    return '';
                },
                'filter' => $itemTypes,
                'enableSorting' => false,
                'format' => 'raw',
            ],
            [
                'attribute' => 'item_id',
                'value' => function (Log $model) use ($itemTypes) {
                    if ($itemTypes[$model->item_type]) {
                        return Html::a('#' . $model->item_id, [
                            '/' . $itemTypes[$model->item_type].'/view',
                            'id' => $model->item_id
                        ]);
                    }
                    return '';
                },
                'headerOptions' => ['style' => 'width: 64px'],
                'enableSorting' => false,
                'format' => 'raw',
            ],
            [
                'class' => EnumColumn::class,
                'attribute' => 'action',
                'value' => function (Log $model) use ($itemActions) {
                    if ($itemActions[$model->action]) {
                        return Html::tag('span', $itemActions[$model->action], ['class' => 'label label-primary']);
                    }
                    return '';
                },
                'filter' => $itemActions,
                'enableSorting' => false,
                'format' => 'raw',
            ],
            [
                'attribute' => 'user',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'user_ip',
                'value' => function (Log $log) {
                    return long2ip($log->user_ip);
                },
                'enableSorting' => false,
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
