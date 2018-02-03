<?php

use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap\ActiveForm;
use backend\models\User;

/**
 * @var View $this
 * @var User $model
 */
$this->title = 'Update User: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Memberships', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="document-update">
    <div class="document-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->field($model, 'username')->textInput() ?>

        <div class="form-group">
            <?php echo Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <script>
        (function(){
            var unlimCheckbox = document.getElementById('membership-unlimited_downloads'),
                maxDownloadInput = document.getElementById('membership-max_downloads');
            unlimCheckbox.onchange = function(){
                if (this.checked) {
                    maxDownloadInput.value = 0;
                    maxDownloadInput.disabled = true;
                    return;
                }
                maxDownloadInput.disabled = false;
            };
            unlimCheckbox.onchange();
        })();
    </script>
</div>
