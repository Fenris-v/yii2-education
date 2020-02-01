<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m200201_213804_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'publishing_id' => $this->integer(),
            'title' => $this->string(),
            'year' => $this->integer(),
            'photo_url' => $this->string(),
            'cost' => $this->integer(),
            'description' => $this->text(),
        ]);

        $this->createIndex(
            'idx-publishing_id',
            'books',
            'publishing_id'
        );

        $this->addForeignKey(
            'fk-publishing_id',
            'books',
            'publishing_id',
            'publishing',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-category_id',
            'books',
            'id'
        );

        $this->addForeignKey(
            'fk-category_id',
            'books',
            'id',
            'books_categories',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-author_id',
            'books',
            'id'
        );

        $this->addForeignKey(
            'fk-author_id',
            'books',
            'id',
            'books_authors',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
