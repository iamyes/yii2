<?php

use yii\db\Schema;
use yii\db\Migration;

class m170706_134527_total extends Migration
{
    public function up()
    {
        $this->createTable('total', [
            'id' => Schema::TYPE_PK,
            'dish_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'ingredients_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        $this->createIndex('dish_id','total','dish_id');
        $this->createIndex('ingredients_id','total','ingredients_id');
        $this->addForeignKey('dish_id', 'total', 'dish_id', 'dish', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('ingredients_id', 'total', 'ingredients_id', 'ingredients', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('total');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170706_134527_total cannot be reverted.\n";

        return false;
    }
    */
}
