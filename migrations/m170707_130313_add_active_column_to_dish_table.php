<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles adding active to table `dish`.
 */
class m170707_130313_add_active_column_to_dish_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('dish', 'active', Schema::TYPE_BOOLEAN . ' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('dish', 'active');
    }
}
