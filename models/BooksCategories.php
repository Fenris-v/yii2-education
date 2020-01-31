<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Publishing
 *
 * @property int $id
 * @property string $categories
 *
 * @package app\models
 */
class BooksCategories extends ActiveRecord
{
    public static function tableName()
    {
        return 'books_categories';
    }
}
