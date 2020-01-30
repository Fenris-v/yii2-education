<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Publishing
 *
 * @property int $id
 * @property string $name
 *
 * @package app\models
 */
class Publishing extends ActiveRecord
{
    public static function tableName()
    {
        return 'publishing';
    }
}
