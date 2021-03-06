<?php

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ButtonEdit;
use backend\widgets\ButtonDelete;
use backend\models\MailerAlias;

/**
 * @var View $this
 * @var MailerAlias $model
 */

$this->title = $model;
$this->params['breadcrumbs'][] = ['label' => 'Mailer Aliases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-alias-view">
    <p>
        <?=ButtonEdit::widget([
            'link' => ['update', 'id' => $model->id],
        ])?>
        <?=ButtonDelete::widget([
            'link' => ['delete', 'id' => $model->id],
        ])?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'domain_id',
                'value' => Html::a($model->domain->name, ['/mailer-domains/view', 'id' => $model->domain_id]),
                'format' => 'raw',
            ],
            'source',
            'destination',
        ],
    ]) ?>
</div>
