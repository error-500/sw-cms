<?php

use yii\db\Migration;

/**
 * Class m210319_081350_extend_pages_autogen_menu
 */
class m210319_081350_extend_pages_autogen_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            '{{%page_item}}',
            'menu_name',
            $this->string(100)->null()->comment('Наименование пункта меню')
        );
        $this->addColumn(
            '{{%page_item}}',
            'active',
            $this->boolean()->notNull()->defaultValue(true)->comment('Доступна на сайте')
        );
        $this->createIndex(
            'page_item_active_idx',
            '{{%page_item}}',
            ['active']
        );
        $this->createIndex(
            'page_item_menu_idx',
            '{{%page_item}}',
            ['menu_name'],
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('page_item_menu_idx','{{%page_item}}');
        $this->dropIndex(
            'page_item_active_idx',
            '{{%page_item}}'
        );
        $this->dropColumn(
            '{{%page_item}}',
            'active'
        );
        $this->dropColumn('{{%page_item}}', 'menu_name');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210319_081350_extend_pages_autogen_menu cannot be reverted.\n";

        return false;
    }
    */
}