<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property integer $id
 * @property string $name
 * @property string $photo
 * @property string $intro
 * @property string $text
 * @property string $position
 * @property integer $order
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text', 'position', 'status','order'], 'required'],
            [['text'], 'string'],
            [['order'], 'integer'],
            [['photo'], 'file'],
            [['name', 'position'], 'string', 'max' => 255],
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
            'photo' => 'Фото',
            'text' => 'Краткая информация',
            'position' => 'Должность',
            'order' => 'Order',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return PersonalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonalQuery(get_called_class());
    }
}
