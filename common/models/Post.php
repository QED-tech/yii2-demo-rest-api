<?php

namespace common\models;

use common\models\query\PostQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $title
 * @property string $content
 *
 * @property-read array $links
 * @property User $user
 */
class Post extends ActiveRecord implements Linkable
{
    public static function tableName(): string
    {
        return '{{%post}}';
    }

    public function rules(): array
    {
        return [
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }


    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public static function find(): PostQuery
    {
        return new PostQuery(get_called_class());
    }

    public function extraFields(): array
    {
        return [
            'author' => 'user',
        ];
    }

    public function getLinks(): array
    {
        return [
            'self' => Url::to(['post/view', 'id' => $this->id], true),
        ];
    }
}
