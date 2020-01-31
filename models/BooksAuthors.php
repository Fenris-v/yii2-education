<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Publishing
 *
 * @property int $id
 * @property int $book_id
 * @property int $author_id
 *
 * @package app\models
 */
class BooksAuthors extends ActiveRecord
{
    public static function tableName()
    {
        return 'books_authors';
    }

    public function rules()
    {
        return [
            [['book_id', 'author_id'], 'required'],
            [['book_id', 'author_id'], 'integer']
        ];
    }
}
