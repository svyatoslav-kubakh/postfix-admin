<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MailerAlias */

$this->title = 'Create Mailer Alias';
$this->params['breadcrumbs'][] = ['label' => 'Mailer Aliases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-alias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
