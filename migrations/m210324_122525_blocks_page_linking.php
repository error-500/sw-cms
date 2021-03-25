<?php

use yii\db\Migration;

/**
 * Class m210324_122525_blocks_page_linking
 */
class m210324_122525_blocks_page_linking extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $prefix = $this->db->tablePrefix;

        $this->createTable(
            "{{%page_block_link}}",
            [
                'page_id' => $this->integer(),
                'block_id' => $this->integer(),
                'position' => $this->smallInteger(),
            ]
        );
        $this->addPrimaryKey(
            "{$prefix}page_block_link_pk",
            "{{%page_block_link}}",
            [
                'page_id',
                'block_id',
            ]
        );
        $this->addForeignKey(
            "{$prefix}block_link_page_fk",
            "{{%page_block_link}}",
            ['page_id'],
            "{{%page_item}}",
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            "{$prefix}page_link_block_fk",
            "{{%page_block_link}}",
            ['block_id'],
            "{{%block_item}}",
            ['id'],
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $prefix = $this->db->tablePrefix;
        $this->dropForeignKey(
            "{$prefix}page_link_block_fk",
            "{{%page_block_link}}"
        );
        $this->dropForeignKey(
            "{$prefix}block_link_page_fk",
            "{{%page_block_link}}"
        );
        $this->dropTable("{{%page_block_link}}");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210324_122525_blocks_page_linking cannot be reverted.\n";

        return false;
    }
    */
}