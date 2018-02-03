<?php

use yii\web\View;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use backend\widgets\ButtonCreate;
use backend\components\grid\ActionColumn;
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
    <p><?=ButtonCreate::widget([
            'label' => 'Create Domain',
            'link' => ['create'],
        ])?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'class' => ActionColumn::class,
            ],
        ],
    ]); ?>
</div>
