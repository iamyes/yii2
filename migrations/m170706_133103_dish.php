<?php

use yii\db\Schema;
use yii\db\Migration;

class m170706_133103_dish extends Migration
{
    public function up()
    {
        $this->createTable('dish', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('dish');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170706_133103_dish cannot be reverted.\n";

        return false;
    }
    */
}
