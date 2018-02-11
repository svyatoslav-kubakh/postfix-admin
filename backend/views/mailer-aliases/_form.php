<?php

use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\MailerAlias;
use backend\widgets\ButtonSave;

/**
 * @var View $this
 * @var MailerAlias $model
 * @var ActiveForm $form
 * @var array $domainsList
 */
?>
<div class="mailer-alias-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'domain_id')->dropDownList(['' => ''] + $domainsList) ?>
    <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?=ButtonSave::widget()?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
