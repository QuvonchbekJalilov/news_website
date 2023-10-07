<?php

use yii\db\Migration;

/**
 * Class m231007_065345_add_image_column_table_news
 */
class m231007_065345_add_image_column_table_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('news' , 'image' ,$this->string()->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231007_065345_add_image_column_table_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231007_065345_add_image_column_table_news cannot be reverted.\n";

        return false;
    }
    */
}
