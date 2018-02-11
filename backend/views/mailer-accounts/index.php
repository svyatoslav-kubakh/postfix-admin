<?php

use yii\web\View;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use backend\components\grid\ActionColumn;
use backend\components\grid\EnumColumn;
use backend\widgets\ButtonCreate;
use backend\models\MailerAccount;
use backend\models\search\MailerAccountSearch;

/**
 * @var View $this
 * @var MailerAccountSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 * @var array $domainsList
 */
$this->title = 'Mailer Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-account-index">
    <p>
        <?=ButtonCreate::widget([
            'label' => 'Create Account',
            'link' => ['create'],
        ])?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'email:email',
            [
                'class' => EnumColumn::class,
                'attribute' => 'domain_id',
                'value' => function (MailerAccount $model) {
                    return Html::a($model->domain->name, ['/mailer-domains/view', 'id' => $model->domain_id]);
                },
                'enum' => $domainsList,
                'filter' => $domainsList,
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>
</div>
