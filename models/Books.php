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
            [['publishing_id', 'title', 'year', 'photo_url', 'cost', 'description', 'authors', 'category_id'], 'required'],
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

    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['id' => 'category_id']);
    }
}

//blog_id = book_id
//tag_id = author_id
