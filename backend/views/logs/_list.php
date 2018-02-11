<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use kartik\date\DatePicker;
use backend\models\Log;
use backend\models\search\LogSearch;
use backend\components\grid\ActionColumn;
use backend\components\grid\EnumColumn;
use backend\components\grid\LogActionColumn;

/**
 * @var LogSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 * @var array $itemTypes
 */


?>

<div class="log-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel ?? null,
        'columns' => [
            [
                'attribute' => 'log_date',
                'value' => function (Log $log) {
                    return
                        Html::tag('span', '', ['class' => "glyphicon glyphicon-time"]) . ' ' .
                        date('Y-m-d H:i', $log->log_date);
                },
                'filter' => isset($searchModel) ? DatePicker::widget([
                    'type' => DatePicker::TYPE_INPUT,
                    'model' => $searchModel,
                    'attribute' => 'log_date',
                    'pluginOptions' => ['format' => 'yyyy-mm-dd']
                ]) : null,
                'enableSorting' => false,
                'format' => 'raw',
            ],
            [
                'class' => EnumColumn::class,
                'attribute' => 'item_type',
                'value' => function (Log $model) use ($itemTypes) {
                    if (isset($itemTypes[$model->item_type])) {
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
                    if (isset($itemTypes[$model->item_type])) {
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
                'class' => LogActionColumn::class,
                'attribute' => 'action',
                'enableSorting' => false,
                'format' => 'raw',
            ],
            [
                'attribute' => 'user',
                'value' => function (Log $log) {
                    if ($log->user) {
                        return $log->user;
                    }
                    return Html::tag('span', 'console', ['class' => 'label label-default']);
                },
                'format' => 'raw',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'user_ip',
                'value' => function (Log $log) {
                    if (!$log->user_ip) {
                        return '';
                    }
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
