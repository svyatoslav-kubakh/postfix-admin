<?php

use yii\web\View;
use backend\models\MailerDomain;

/**
 * @var View $this
 * @var MailerDomain $model
 */

$this->title = 'Update Mailer Domain: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mailer Domains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mailer-domain-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
