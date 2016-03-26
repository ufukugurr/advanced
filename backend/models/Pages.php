<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $keys
 * @property string $content
 * @property string $cover
 * @property integer $status
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['title', 'slug', 'description', 'keys', 'content'], 'required'],
            [['description', 'keys', 'content'], 'string'],
            [['status'], 'integer'],
            [['title', 'slug', 'cover'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'keys' => 'Keys',
            'content' => 'Content',
            'cover' => 'Cover',
            'status' => 'Status',
        ];
    }
}
