<?php

use yii\web\View;
use backend\models\MailerAlias;

/**
 * @var View $this
 * @var MailerAlias $model
 * @var array $domainsList
 */
$this->title = 'Update Mailer Alias: ' . $model;
$this->params['breadcrumbs'][] = ['label' => 'Mailer Aliases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mailer-alias-update">
    <?= $this->render('_form', [
        'model' => $model,
        'domainsList' => $domainsList,
    ]) ?>
</div>
