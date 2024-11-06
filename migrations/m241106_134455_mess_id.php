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
    }
    
    public function down()
    {
        $this->dropTable('message');
    }
    
}
