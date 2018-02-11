<?php

use yii\web\View;
use yii\widgets\ActiveForm;
use backend\models\User;
use backend\widgets\ButtonSave;

/**
 * @var View $this
 * @var User $model
 * @var ActiveForm $form
 */
?>
<div class="mailer-domain-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->dropDownList([
        User::STATUS_DELETED => 'inactive',
        User::STATUS_ACTIVE => 'active',
    ]) ?>
    <?= $form->field($model, 'password')->passwordInput(['value' => '']) ?>
    <div class="form-group">
        <?=ButtonSave::widget()?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
