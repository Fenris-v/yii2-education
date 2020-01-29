<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Publishing
 *
 * @property int $id
 * @property string $publishing
 *
 * @package app\models
 */
class BooksAuthors extends ActiveRecord
{
    public static function tableName()
    {
        return 'books_authors';
    }

    public function getAuthors()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }
}
