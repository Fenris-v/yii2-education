<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Publishing
 *
 * @property int $id
 * @property int $book_id
 * @property int $category_id
 *
 * @package app\models
 */
class BooksCategories extends ActiveRecord
{
    public static function tableName()
    {
        return 'books_categories';
    }

    public function rules()
    {
        return [
            [['book_id', 'author_id'], 'required'],
            [['book_id', 'author_id'], 'integer']
        ];
    }
}
