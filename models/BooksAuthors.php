<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Publishing
 *
 * @property int $id
 * @property string $authors
 *
 * @package app\models
 */
class BooksAuthors extends ActiveRecord
{
    public static function tableName()
    {
        return 'books_authors';
    }
}
