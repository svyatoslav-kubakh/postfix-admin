<?php

/**
 * @var $this yii\web\View
 * @var $model backend\models\MailerAccount
 * @var array $domainsList
 */

$this->title = 'Create Mailer Account';
$this->params['breadcrumbs'][] = ['label' => 'Mailer Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create'
?>
<div class="mailer-account-create">
    <?= $this->render('_form', [
        'model' => $model,
        'domainsList' => $domainsList,
    ]) ?>
</div>
