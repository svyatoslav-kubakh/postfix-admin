<?php

use yii\web\View;
use backend\models\MailerDomain;

/**
 * @var View $this
 * @var MailerDomain $model
 */

$this->title = 'Create Mailer  Domain';
$this->params['breadcrumbs'][] = ['label' => 'Mailer Domains', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="mailer-domain-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
