<?php

use yii\web\View;

/**
 * @var View $this
 * @var User $model
 */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="mailer-domain-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
