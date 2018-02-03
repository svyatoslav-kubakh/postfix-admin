<?php

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\search\MailerDomainSearch;

/**
 * @var View $this
 * @var MailerDomainSearch $model
 * @var ActiveForm $form
 */

?>
<div class="mailer-domain-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'name') ?>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
