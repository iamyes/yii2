<?php

use yii\db\Migration;

class m170707_130647_index_column extends Migration
{
    public function up()
    {
        $this->createIndex('active','dish','active');
        $this->createIndex('active','ingredients','active');
        $this->addForeignKey('active', 'dish', 'active', 'ingredients', 'active', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('active', 'dish');
        $this->dropIndex('active','dish');
        $this->dropIndex('active','ingredients');

        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170707_130647_index_column cannot be reverted.\n";

        return false;
    }
    */
}
