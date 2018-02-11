<?php

use yii\web\View;
use yii\widgets\ActiveForm;
use backend\widgets\ButtonSave;
use backend\models\MailerAccount;

/**
 * @var View $this
 * @var MailerAccount $model
 * @var ActiveForm $form
 * @var array $domainsList
 */

list($model->email) = explode('@', $model->email);
?>
<div class="mailer-account-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email part (before @)') ?>
    <?= $form->field($model, 'domain_id')->dropDownList(['' => ''] + $domainsList) ?>
    <?php if (! $model->isNewRecord) : ?>
        <?= $form->field($model, 'password')->checkbox() ?>
    <?php endif; ?>
    <div class="form-group">
        <?=ButtonSave::widget()?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
