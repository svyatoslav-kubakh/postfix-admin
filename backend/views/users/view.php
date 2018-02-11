<?php

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use backend\widgets\Button;
use backend\widgets\ButtonEdit;
use backend\widgets\ButtonDelete;
use backend\models\User;
use backend\models\Log;

/**
 * @var View $this
 * @var User $model
 * @var Log|null $lastLog
 * @var ActiveDataProvider $membershipDataProvider
 * @var ActiveDataProvider $logsDataProvider
 * @var array $itemTypes
 * @var array $itemActions
 */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-view">
    <p>
        <?=ButtonEdit::widget([
            'link' => ['update', 'id' => $model->id],
        ])?>
        <?php if ($model->isDeleteAllowed()) : ?>
            <?=ButtonDelete::widget([
                'link' => ['delete', 'id' => $model->id],
            ])?>
        <?php endif; ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            [
                'value' => $model->status === User::STATUS_ACTIVE
                    ? HTML::tag('span', 'active', ['class' => ['label', 'label-success']])
                    : HTML::tag('span', 'inactive', ['class' => ['label', 'label-default']]),
                'attribute' => 'status',
                'format' => 'raw',
            ],
            [
                'attribute' => 'created_at',
                'format' => 'date',
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'date',
            ],
        ],
    ]) ?>


    <br/><h3>last activity</h3>
    <?= $this->render('/logs/_list', [
        'dataProvider' => $logsDataProvider,
        'itemTypes' => $itemTypes,
        'itemActions' => $itemActions,
    ]); ?>
    <?=Button::widget([
        'link' => ['/logs', 'LogSearch' => ['user' => $model->username]],
        'buttonType' => 'primary',
        'iconClass' => 'glyphicon glyphicon-time',
        'label' => 'More logs...',
    ])?>
</div>
