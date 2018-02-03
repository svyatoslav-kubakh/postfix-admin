<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MailerAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mailer Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mailer Account', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'domain_id',
            'email:email',
            'password',
            'meta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
