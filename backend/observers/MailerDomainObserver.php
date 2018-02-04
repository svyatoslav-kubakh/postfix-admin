<?php
namespace backend\observers;

use yii\base\ModelEvent;
use backend\models\Log;

class MailerDomainObserver
{
    public function observe(ModelEvent $event)
    {
        Log::find()->createLogEntity($event)->save();
    }
}
