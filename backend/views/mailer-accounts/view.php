<?php

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ButtonEdit;
use backend\widgets\ButtonDelete;
use backend\models\MailerAccount;

/**
 * @var View $this
 * @var MailerAccount $model
 */
$this->title = 'Mailer Account: ' . $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Mailer Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->email;
?>
<div class="mailer-account-view">
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
                'attribute' => 'email',
                'value' => function (MailerAccount $model) {
                    return Html::a($model->email, 'mailto:'.$model->email);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'domain_id',
                'value' => function (MailerAccount $model) {
                    return Html::a($model->domain->name, ['/mailer-domains/view', 'id' => $model->domain_id]);
                },
                'format' => 'raw',
            ],
        ],
    ]) ?>
</div>
