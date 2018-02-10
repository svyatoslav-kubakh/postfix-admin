<?php

use yii\base\Event;
use yii\db\ActiveRecord;
use backend\observers\LogObserver;
use backend\models\LoggableInterface;

Event::on(
    LoggableInterface::class,
    ActiveRecord::EVENT_AFTER_INSERT,
    [LogObserver::class, 'observeCreate']
);

Event::on(
    LoggableInterface::class,
    ActiveRecord::EVENT_BEFORE_UPDATE,
    [LogObserver::class, 'observeUpdate']
);

Event::on(
    LoggableInterface::class,
    ActiveRecord::EVENT_BEFORE_DELETE,
    [LogObserver::class, 'observeDelete']
);
