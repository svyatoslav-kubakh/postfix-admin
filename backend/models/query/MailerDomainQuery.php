<?php
namespace backend\models\query;

use yii\db\ActiveQuery;
use backend\models\MailerDomain;

class MailerDomainQuery extends ActiveQuery
{
    public function getListValues()
    {
        /** @var MailerDomain $domain */
        $domains = [];
        foreach ($this->all() as $domain) {
            $domains[$domain->id] = $domain->name;
        }
        return $domains;
    }
}
