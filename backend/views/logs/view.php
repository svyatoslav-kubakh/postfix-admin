<?php

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Log;

/**
 * @var View $this
 * @var Log $model
 * @var array $itemTypes
 * @var array $itemActions
 */

$this->title = 'Log event #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = '#' . $model->id;
?>
<div class="log-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'log_date',
                'value' => Html::tag('span', '', ['class' => "glyphicon glyphicon-time"]) . ' ' .
                    date('Y-m-d H:i', $model->log_date),
                'format' => 'raw',
            ],
            [
                'attribute' => 'item_type',
                'value' => isset($itemTypes[$model->item_type])
                    ? Html::a($itemTypes[$model->item_type], ['/' . $itemTypes[$model->item_type]])
                    : '',
                'format' => 'raw',
            ],
            [
                'attribute' => 'item_id',
                'value' => isset($itemTypes[$model->item_type])
                    ? Html::a('#' . $model->item_id, [
                        '/' . $itemTypes[$model->item_type].'/view',
                        'id' => $model->item_id
                    ])
                    : '',
                'format' => 'raw',
            ],
            [
                'attribute' => 'action',
                'value' => isset($itemActions[$model->action])
                    ? Html::tag('span', $itemActions[$model->action], ['class' => 'label label-primary'])
                    : '',
                'format' => 'raw',
            ],
            'user',
            [
                'attribute' => 'user_ip',
                'value' => long2ip($model->user_ip),
            ],
            [
                'attribute' => 'old_data',
                'value' => Html::tag('pre', $model->old_data),
                'format' => 'raw',
            ],
            [
                'attribute' => 'new_data',
                'value' => Html::tag('pre', $model->new_data),
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
