<?php

use yii\base\Event;
use common\models\User;
use console\observers\UserLogObserver;

Event::on(
    User::class,
    User::EVENT_BEFORE_UPDATE,
    [UserLogObserver::class, 'observe']
);
