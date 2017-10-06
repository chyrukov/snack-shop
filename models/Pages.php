<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\PagesQuery;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $created
 * @property integer $updated
 * @property string $alias
 * @property string $seo_title
 * @property string $seo_desc
 * @property string $seo_keyword
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created', 'updated'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated'],
                ],
            ],
        ];
    }
    
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'alias', 'status'], 'required'],
            [['text'], 'string'],
            [['created', 'updated'], 'integer'],
            [['title', 'alias', 'seo_title'], 'string', 'max' => 255],
            [['seo_desc', 'seo_keyword'], 'string', 'max' => 512],
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
            'text' => 'Текст',
            'created' => 'Created',
            'updated' => 'Updated',
            'alias' => 'Alias',
            'status' => 'Статус',
            'seo_title' => 'Seo Title',
            'seo_desc' => 'Seo Desc',
            'seo_keyword' => 'Seo Keyword',
        ];
    }
    
    public static function find()
    {
        return new PagesQuery(get_called_class());
    }
}
