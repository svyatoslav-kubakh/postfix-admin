<?php

use yii\grid\GridView;
use backend\widgets\ButtonCreate;
use backend\components\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MailerDomainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mailer Domains';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-domain-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
