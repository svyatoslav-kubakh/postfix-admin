<?php

use yii\web\View;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use backend\widgets\ButtonCreate;
use backend\components\grid\ActionColumn;
use backend\models\search\MailerDomainSearch;
use backend\components\grid\EnumColumn;

/**
 * @var View $this
 * @var MailerDomainSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 * @var array $domainsList
 */
$this->title = 'Mailer Aliases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-alias-index">
    <p><?=ButtonCreate::widget([
            'label' => 'Create Alias',
            'link' => ['create'],
        ])?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'class' => EnumColumn::class,
                'attribute' => 'domain_id',
                'value' => 'domain.name',
                'enum' => $domainsList,
                'filter' => $domainsList,
            ],
            'source',
            'destination',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>
</div>
