<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles adding active to table `ingredients`.
 */
class m170707_122014_add_active_column_to_ingredients_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('ingredients', 'active', Schema::TYPE_BOOLEAN . ' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('ingredients', 'active');
    }
}
