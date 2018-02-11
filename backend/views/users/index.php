<?php

use yii\helpers\Html;
use yii\web\View;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use backend\widgets\ButtonCreate;
use backend\models\User;
use backend\models\search\UserSearch;
use backend\components\grid\ActionColumn;
use backend\components\grid\EnumColumn;

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 * @var UserSearch $searchModel
 */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index">
    <p><?=ButtonCreate::widget([
        'label' => 'Create User',
        'link' => ['create'],
    ])?></p>
    <?php if (Yii::$app->session->hasFlash('success')) : ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Saved!</h4>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
            [
                'class' => EnumColumn::class,
                'attribute' => 'status',
                'enum' => [
                    User::STATUS_ACTIVE => HTML::tag('span', 'active', ['class' => ['label', 'label-success']]),
                    User::STATUS_DELETED => HTML::tag('span', 'inactive', ['class' => ['label', 'label-default']]),
                ],
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
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update} {delete}',
                'visibleButtons' => [
                    'delete' => function (User $user) {
                        return $user->isDeleteAllowed();
                    },
                ],
            ],
        ],
    ]); ?>
</div>
