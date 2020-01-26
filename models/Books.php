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
            [['publishing_id', 'title', 'year', 'photo_url', 'cost', 'description', 'authors'], 'required'],
            [['description'], 'string', 'min' => 50],
            [['year'], 'string', 'length' => [4, 4]]
        ];
    }
}
