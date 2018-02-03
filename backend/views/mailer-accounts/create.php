<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MailerAccount */

$this->title = 'Create Mailer Account';
$this->params['breadcrumbs'][] = ['label' => 'Mailer Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-account-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
