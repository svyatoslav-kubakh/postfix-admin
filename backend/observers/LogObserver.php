<?php
namespace backend\observers;

use yii\base\ModelEvent;
use yii\db\AfterSaveEvent;
use backend\models\Log;
use yii\db\ActiveRecord;

class LogObserver
{
    public function observeCreate(AfterSaveEvent $event)
    {
        Log::find()
            ->createLogEntity(
                self::getEntity($event),
                Log::ACTION_CREATE,
                false,
                true
            )->save();
    }

    public function observeUpdate(ModelEvent $event)
    {
        Log::find()
            ->createLogEntity(
                self::getEntity($event),
                Log::ACTION_UPDATE
            )->save();
    }

    public function observeDelete(ModelEvent $event)
    {
        Log::find()
            ->createLogEntity(
                self::getEntity($event),
                Log::ACTION_DELETE,
                true,
                false
            )->save();
    }

    /**
     * @param $event
     * @return ActiveRecord
     */
    protected function getEntity($event)
    {
        return $event->sender;
    }
}
