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

    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
