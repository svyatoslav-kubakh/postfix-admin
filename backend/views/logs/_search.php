<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user') ?>

    <?= $form->field($model, 'user_ip') ?>

    <?= $form->field($model, 'item_type') ?>

    <?= $form->field($model, 'item_id') ?>

    <?php // echo $form->field($model, 'action') ?>

    <?php // echo $form->field($model, 'old_data') ?>

    <?php // echo $form->field($model, 'new_data') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
