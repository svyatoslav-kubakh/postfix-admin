<?php

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use backend\widgets\ButtonEdit;
use backend\widgets\ButtonDelete;
use backend\models\User;

/**
 * @var View $this
 * @var User $model
 * @var ActiveDataProvider $membershipDataProvider
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
</div>
