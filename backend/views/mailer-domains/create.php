<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MailerDomain */

$this->title = 'Create Mailer Domain';
$this->params['breadcrumbs'][] = ['label' => 'Mailer Domains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-domain-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
