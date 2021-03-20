<?php

use yii\db\Migration;

/**
 * Class m210319_132517_extend_products_autogen_menu
 */
class m210319_132517_extend_products_autogen_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            "{{%product_group}}",
            'active',
            $this->boolean()->notNull()->defaultValue(true)->comment('Доступно для просмотра')
        );
        $this->addColumn(
            "{{%product_item}}",
            'active',
            $this->boolean()->notNull()->defaultValue(true)->comment('Доступно для просмотра')
        );
        $this->createIndex(
            $this->db->tablePrefix.'product_group_active_idx',
            '{{%product_group}}',
            ['id', 'active'],
            false
        );
        $this->createIndex(
            $this->db->tablePrefix.'product_item_active_idx',
            '{{%product_item}}',
            ['id', 'active'],
            false
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            $this->db->tablePrefix.'product_group_active_idx',
            '{{%product_group}}'
        );
        $this->dropIndex(
            $this->db->tablePrefix.'product_item_active_idx',
            '{{%product_item}}'
        );
        $this->dropColumn(
            "{{%product_group}}",
            'active'
        );
        $this->dropColumn(
            "{{%product_item}}",
            'active'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210319_132517_extend_products_autogen_menu cannot be reverted.\n";

        return false;
    }
    */
}