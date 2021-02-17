<?php

use yii\db\Migration;

/**
 * Class m210216_120915_blog_gallery_link
 */
class m210216_120915_blog_gallery_link extends Migration
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
        $this->createTable(
            '{{%blog_gallery_link}}',
            [
                'blog_id' => $this->integer(),
                'gallery_id' => $this->integer()
            ],
            $tableOptions
        );
        $this->addPrimaryKey(
            'sw_blog_gallery_idx',
            '{{%blog_gallery_link}}',
            [
                'blog_id',
                'gallery_id'
            ]
        );
        $this->addForeignKey(
            'gallery_blog_id_fk',
            '{{%blog_gallery_link}}',
            [
                'blog_id'
            ],
            '{{%blog_item}}',
            [
                'id'
            ],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'gallery_groups_id_fk',
            '{{%blog_gallery_link}}',
            [
                'gallery_id'
            ],
            '{{%gallery_group}}',
            [
                'id'
            ],
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'gallery_groups_id_fk',
            '{{%blog_gallery_link}}'
        );
        $this->dropForeignKey(
            'gallery_blog_id_fk',
            '{{%blog_gallery_link}}'
        );
        $this->dropTable('{{%blog_gallery_link}}');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_120915_blog_gallery_link cannot be reverted.\n";

        return false;
    }
    */
}