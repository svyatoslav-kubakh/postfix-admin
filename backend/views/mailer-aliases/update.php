<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MailerAlias */

$this->title = 'Update Mailer Alias: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Mailer Aliases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mailer-alias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
