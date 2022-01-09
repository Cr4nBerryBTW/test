<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%store}}`.
 */
class m220109_163922_create_store_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%store}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'date' => $this->dateTime()->notNull(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%store}}');
    }
}
