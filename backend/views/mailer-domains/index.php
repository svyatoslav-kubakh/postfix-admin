<?php

use yii\web\View;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use backend\widgets\ButtonCreate;
use backend\components\grid\ActionColumn;
use backend\models\MailerDomain;
use backend\models\search\MailerDomainSearch;

/**
 * @var View $this
 * @var MailerDomainSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

$this->title = 'Mailer Domains';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-domain-index">
    <p>
        <?=ButtonCreate::widget([
            'label' => 'Create Domain',
            'link' => ['create'],
        ])?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'accounts',
                'value' => function (MailerDomain $model) {
                    return Html::a(
                        Html::tag('span', $model->getAccounts()->count(), ['class' => 'badge']),
                        ['/mailer-accounts', 'MailerAccountSearch' => ['domain_id' => $model->id]]
                    );
                },
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
                'format' => 'raw',
            ],
            [
                'attribute' => 'aliases',
                'value' => function (MailerDomain $model) {
                    return Html::a(
                        Html::tag('span', $model->getAliases()->count(), ['class' => 'badge']),
                        ['/mailer-aliases', 'MailerAliasSearch' => ['domain_id' => $model->id]]
                    );
                },
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::class,
                'visibleButtons' => [
                    'delete' => function (MailerDomain $user) {
                        return $user->isDeleteAllowed();
                    },
                ],
            ],
        ],
    ]); ?>
</div>
