<?php

use yii\base\Event;
use backend\observers\MailerDomainObserver;
use backend\models\MailerDomain;

Event::on(
    MailerDomain::class,
    MailerDomain::EVENT_BEFORE_UPDATE,
    [MailerDomainObserver::class, 'observe']
);
