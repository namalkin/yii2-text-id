<?php

use yii\db\Migration;

/**
 * Class m241106_134455_mess_id
 */
class m241106_134455_mess_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241106_134455_mess_id cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('message', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
        ]);

        $this->execute('ALTER TABLE message CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci');
    }
    
    public function down()
    {
        $this->dropTable('message');
    }
    
}
