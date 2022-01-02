<?php

use yii\db\Migration;

/**
 * Class m220102_205931_add_admin_to_user_table
 */
class m220102_205931_add_admin_to_user_table extends Migration
{
    const PASSWORD = "123456789";

    /**
     * @throws \yii\base\Exception
     */
    private function setPassword(): string
    {
        return Yii::$app->security->generatePasswordHash(self::PASSWORD);
    }

    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'password_hash' => $this->setPassword(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', ['id' => 1]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220102_205931_add_admin_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
