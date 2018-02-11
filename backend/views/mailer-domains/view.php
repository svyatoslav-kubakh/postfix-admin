<?php

use yii\web\View;
use yii\helpers\Html;
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
            [
                'attribute' => 'accounts',
                'value' => function (MailerDomain $model) {
                    return Html::a(
                        Html::tag('span', $model->getAccounts()->count(), ['class' => 'badge']),
                        ['/mailer-accounts', 'MailerAccountSearch' => ['domain_id' => $model->id]]
                    );
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'aliases',
                'value' => function (MailerDomain $model) {
                    return Html::a(
                        Html::tag('span', $model->getAliases()->count(), ['class' => 'badge']),
                        ['/mailer-aliases', 'MailerAliasSearch' => ['domain_id' => $model->id]]
                    );
                },
                'format' => 'raw',
            ],
        ],
    ]) ?>
</div>
