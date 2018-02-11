<?php

use yii\web\View;
use backend\models\User;

/**
 * @var View $this
 * @var User $model
 */
$this->title = 'Update User: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="document-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
