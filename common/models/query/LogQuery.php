<?php
namespace common\models\query;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
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

    /**
     * @param ActiveRecord $entity
     * @param int $action
     * @param bool $safeOldData
     * @param bool $saveNewData
     * @return Log
     */
    public function createLogEntity(ActiveRecord $entity, $action, $safeOldData = true, $saveNewData = true)
    {
        $log = new Log();
        $log->setAttributes([
            'action' => $action,
            'item_type' => $this->getEntityType($entity),
            'item_id' => $entity->getPrimaryKey(),
            'old_data' => $safeOldData ? Json::encode($entity->toArray()) : '',
            'new_data' => $saveNewData ? Json::encode($entity->getOldAttributes()) : '',
        ]);
        return $log;
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
