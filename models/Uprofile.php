<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uprofile".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property integer $user_id
 *
 * @property User $user
 */
class Uprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uprofile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'address' => 'Адрес',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return UprofileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UprofileQuery(get_called_class());
    }
    
}
