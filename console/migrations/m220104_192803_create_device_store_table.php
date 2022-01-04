<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device_store}}`.
 */
class m220104_192803_create_device_store_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device_store}}', [
            'id' => $this->primaryKey(),
            'device_id' => $this->integer()->notNull(),
            'store_id' => $this->integer()->notNull(),
        ]);


        $this->createIndex(
            'index_device_id',
            'device_store',
            'store_id'
        );


        $this->addForeignKey(
            'fk_device_id',
            'device_store',
            'device_id',
            'device',
            'id',
            'CASCADE'
        );


        $this->createIndex(
            'index_store_id',
            'device_store',
            'store_id'
        );


        $this->addForeignKey(
            'fk_store_id',
            'device_store',
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
        $this->dropTable('{{%device_store}}');
    }
}
