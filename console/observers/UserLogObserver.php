<?php
namespace console\observers;

use yii\base\ModelEvent;
use common\models\User;
use common\models\Log;

class UserLogObserver
{
    public function observe(ModelEvent $event)
    {
        /** @var User $user */
        $user = $event->sender;
        Log::find()
            ->createLogEntity($user, Log::ACTION_UPDATE)
            ->save();
    }
}
