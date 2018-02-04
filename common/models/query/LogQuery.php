<?php
namespace common\models\query;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\base\ModelEvent;
use common\models\Log;
use common\models\User;
use yii\helpers\Json;

class LogQuery extends ActiveQuery
{
    protected $actionEventMap = [
        ActiveRecord::EVENT_BEFORE_INSERT => Log::ACTION_CREATE,
        ActiveRecord::EVENT_BEFORE_UPDATE => Log::ACTION_UPDATE,
        ActiveRecord::EVENT_BEFORE_DELETE => Log::ACTION_DELETE,
    ];

    protected $entityTypeMap = [
        User::class => Log::ENTITY_USER,
    ];

    public function createLogEntity(ModelEvent $event)
    {
        $log = new Log();
        /** @var ActiveRecord $entity */
        $entity = $event->sender;
//        var_dump($entity); exit;
        $log->setAttributes([
            'action' => $this->getActionId($event->name),
            'item_type' => $this->getEntityType($entity),
            'item_id' => $entity->getPrimaryKey(),
            'old_data' => Json::encode($entity->toArray()),
            'new_data' => Json::encode($entity->getOldAttributes()),
        ]);
        return $log;
    }

    protected function getActionId($actionName)
    {
        if (isset($this->actionEventMap[$actionName])) {
            return $this->actionEventMap[$actionName];
        }
        return Log::ACTION_OTHER;
    }

    protected function getEntityType(ActiveRecord $entity)
    {
        foreach ($this->entityTypeMap as $entityClass => $entityTypeId) {
            if ($entity instanceof $entityClass) {
                return $entityTypeId;
            }
        }
        return Log::ENTITY_UNKNOWN;
    }
}
