<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m220109_164037_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device}}', [
            'id' => $this->primaryKey(),
            'serial_number' => $this->string()->notNull()->unique(),
            'store_id' => $this->integer()->null(),
            'date' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-device_id',
            'device',
            'store_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-device_id',
            'device',
            'store_id',
            'store',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%device}}');
    }
}
