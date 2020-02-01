<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books_categories}}`.
 */
class m200201_203013_create_books_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books_categories}}', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-category_id',
            'books_categories',
            'id'
        );

        $this->addForeignKey(
            'fk-category_id',
            'books_categories',
            'id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books_categories}}');
    }
}
