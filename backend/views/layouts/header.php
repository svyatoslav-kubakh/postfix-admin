<?php
use yii\helpers\Url;
use backend\widgets\Button;

/**
 * @var \yii\web\View $this
 * @var \common\models\User $user
 * @var string $directoryAsset
 * @var string $content
 */
$user = Yii::$app->user->identity;

?>

<header class="main-header">

    <a class="logo" href="<?=Url::to(Yii::$app->homeUrl)?>">
        <span class="logo-mini"><i class="fa fa-envelope-open-o"></i></span>
        <span class="logo-lg"><i class="fa fa-envelope-open-o"></i> <?=Yii::$app->name?></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-md"></i>
                        <span class="hidden-xs"><?= $user->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <p>
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <small>Member since <?= date('M. Y', $user->created_at) ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Button::widget([
                                    'label' => 'Profile',
                                    'link' => ['/users/view', 'id' => $user->id],
                                ]) ?>
                            </div>
                            <div class="pull-right">
                                <?= Button::widget([
                                    'label' => 'Sign out',
                                    'link' => ['/site/logout'],
                                    'options' => ['data-method' => 'post'],
                                ]) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
