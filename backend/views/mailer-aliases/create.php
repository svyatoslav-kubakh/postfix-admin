<?php

use yii\web\View;
use backend\models\MailerAlias;

/**
 * @var View $this
 * @var MailerAlias $model
 * @var array $domainsList
 */
$this->title = 'Create Mailer Alias';
$this->params['breadcrumbs'][] = ['label' => 'Mailer Aliases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-alias-create">
    <?= $this->render('_form', [
        'model' => $model,
        'domainsList' => $domainsList,
    ]) ?>
</div>
