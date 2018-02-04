<?php

use yii\web\View;
use yii\widgets\DetailView;
use backend\widgets\ButtonEdit;
use backend\widgets\ButtonDelete;
use backend\models\MailerDomain;

/**
 * @var View $this
 * @var MailerDomain $model
 */

$this->title = 'Mailer domain: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mailer Domains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="mailer-domain-view">
    <p>
        <?=ButtonEdit::widget([
            'link' => ['update', 'id' => $model->id],
        ])?>
        <?php if ($model->isDeleteAllowed()) : ?>
            <?=ButtonDelete::widget([
                'link' => ['delete', 'id' => $model->id],
        ])?>
        <?php endif; ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>
</div>
