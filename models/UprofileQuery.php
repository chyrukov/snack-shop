<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Uprofile]].
 *
 * @see Uprofile
 */
class UprofileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Uprofile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Uprofile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
