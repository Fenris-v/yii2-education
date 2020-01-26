<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Categories
 *
 * @property int $id
 * @property string $category
 *
 * @package app\models
 */
class Categories extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }
}
