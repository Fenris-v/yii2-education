<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Books
 *
 * @property int $id
 * @property int $publishing_id
 * @property string $title
 * @property string $authors
 * @property string $categories
 * @property string $year
 * @property string $photo_url
 * @property string $cost
 * @property string $description
 * @property int $category_id
 *
 * @package app\models
 */

class Books extends ActiveRecord
{
    public static function tableName()
    {
        return 'books';
    }

    public function rules()
    {
        return [
            [['publishing_id', 'title', 'year', 'photo_url', 'cost', 'description'], 'required'],
            [['description'], 'string', 'min' => 50],
            [['year'], 'string', 'length' => [4, 4]]
        ];
    }

    public function getPublishing()
    {
        return $this->hasOne(Publishing::className(), ['id' => 'publishing_id']);
    }

    public function getBooksAuthors()
    {
        return $this->hasMany(BooksAuthors::className(), ['book_id' => 'id']);
    }

    public function getAuthor()
    {
        return $this->hasMany(Authors::className(), ['id' => 'author_id'])->via('booksAuthors');
    }

    public function getBooksCategories()
    {
        return $this->hasMany(BooksCategories::className(), ['book_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasMany(Categories::className(), ['id' => 'category_id'])->via('booksCategories');
    }
}
