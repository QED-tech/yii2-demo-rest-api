<?php

namespace common\models\query;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Post]].
 *
 * @see Post
 */
class PostQuery extends ActiveQuery
{
    public function forUser($userId): PostQuery
    {
        return $this->andWhere(['user_id' => $userId]);
    }

    public function latest($limit): PostQuery
    {
        return $this->limit($limit)->orderBy(['id' => SORT_DESC]);
    }

    /**
     * {@inheritdoc}
     * @return Post[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Post|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}