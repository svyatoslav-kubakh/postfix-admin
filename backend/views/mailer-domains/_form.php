<?php

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\MailerDomain;
use backend\widgets\ButtonSave;

/**
 * @var View $this
 * @var MailerDomain $model
 * @var ActiveForm $form
 */
?>
<div class="mailer-domain-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?=ButtonSave::widget()?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
