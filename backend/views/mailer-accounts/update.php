<?php

/**
 * @var $this yii\web\View
 * @var $model backend\models\MailerAccount
 * @var array $domainsList
 */
$this->title = 'Update Mailer Account: ' . $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Mailer Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->email, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mailer-account-update">
    <?= $this->render('_form', [
        'model' => $model,
        'domainsList' => $domainsList,
    ]) ?>
</div>
