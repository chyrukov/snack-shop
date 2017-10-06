<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $intro
 * @property string $text
 * @property integer $status
 * @property string $seo_title
 * @property string $seo_desc
 * @property string $seo_keyword
 */
class Info extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['image'], 'file'],
            [['seo_title', 'seo_desc', 'seo_keyword'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'image' => 'Изображение',
            'text' => 'Текст',
            'status' => 'Статус',
            'seo_title' => 'Seo Title',
            'seo_desc' => 'Seo Desc',
            'seo_keyword' => 'Seo Keyword',
        ];
    }
    
    public static function find()
    {
        return new InfoQuery(get_called_class());
    }
}
