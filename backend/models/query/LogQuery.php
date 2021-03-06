<?php
namespace backend\models\query;

use Yii;
use yii\db\ActiveRecord;
use backend\models\Log;
use backend\models\User;
use backend\models\MailerDomain;
use backend\models\MailerAccount;
use backend\models\MailerAlias;
use common\models\query\LogQuery as BaseQuery;

class LogQuery extends BaseQuery
{
    protected $entityTypeMap = [
        User::class => Log::ENTITY_USER,
        MailerDomain::class => Log::ENTITY_MAILER_DOMAIN,
        MailerAccount::class => Log::ENTITY_MAILER_ACCOUNT,
        MailerAlias::class => Log::ENTITY_MAILER_ALIAS,
    ];

    /**
     * @inheritdoc
     */
    public function createLogEntity(ActiveRecord $entity, $action, $safeOldData = true, $saveNewData = true)
    {
        /** @var User $identity */
        $identity = Yii::$app->user->identity;
        $ip = Yii::$app->request->getUserIP();
        $log = parent::createLogEntity($entity, $action, $safeOldData, $saveNewData);
        $log->setAttributes([
            'user' => $identity->username,
            'user_ip' => ip2long($ip),
        ]);
        return $log;
    }
}
