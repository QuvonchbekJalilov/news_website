<?php

use yii\db\Migration;

/**
 * Class m231007_134956_add_role_column_table_user
 */
class m231007_134956_add_role_column_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user' , 'role' ,$this->string()->defaultValue('user'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231007_134956_add_role_column_table_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231007_134956_add_role_column_table_user cannot be reverted.\n";

        return false;
    }
    */
}
