<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[News]].
 *
 * @see News
 */
class PagesQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }
    
    public function advert()
    {
        return $this->andWhere("[[alias]]='advert'");
    }

    /**
     * @inheritdoc
     * @return News[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return News|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
