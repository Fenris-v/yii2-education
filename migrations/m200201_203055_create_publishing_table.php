<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%publishing}}`.
 */
class m200201_203055_create_publishing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%publishing}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%publishing}}');
    }
}
