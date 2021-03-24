<?php

use yii\db\Migration;

/**
 * Class m210302_134747_blog_module_tables
 */
class m210302_134747_blog_module_tables extends Migration
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
            '{{%blog_group}}',
            [
                'id' => $this->primaryKey()
                    ->comment('Идентификатор'),
                'active' => $this->tinyInteger(1)
                    ->notNull()
                    ->defaultValue('1')
                    ->comment('Опубликовано'),
                'tech_name' => $this->string(50)
                    ->unique()
                    ->notNull()
                    ->comment('Техническое название'),
                'name' => $this->string(50)
                    ->notNull()
                    ->comment('Название'),
                'created' => $this->dateTime()
                    ->notNull()
                    ->defaultExpression('CURRENT_TIMESTAMP')
                    ->comment('Создано'),
                'updated' => $this->dateTime()
                    ->notNull()
                    ->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                    ->comment('Обновлено'),
                'pos' => $this->integer(11)
                    ->notNull()

            ],
            $tableOptions
        );
        $this->createTable(
            '{{%blog_item}}',
            [
                'id' => $this->primaryKey()
                            ->comment('Идентификатор'),
                'group_id' => $this->integer(11)
                                ->notNull()
                                ->comment('Группа'),
                'pos' => $this->integer(11)
                            ->notNull()
                            ->defaultValue(0)
                            ->comment('Позиция'),
                'active' => $this->integer(11)
                            ->notNull()
                            ->defaultValue(1)
                            ->comment('Активен'),
                'img'   => $this->string(50)
                                ->null()
                                ->comment('Изображение'),
                'href'  => $this->string(50)
                                ->null()
                                ->comment('Ссылка'),
                'alt'   => $this->string(200)
                                ->null()
                                ->comment('Альт (СЕО)'),
                'title' => $this->string(200)
                            ->notNull()
                            ->comment('Заголовок'),
                'preview_text' => $this->text()
                            ->notNull()
                            ->comment('Короткий текст (превью)'),
                'text'  => $this->text()
                                ->comment('Текст'),
                'created'   => $this->dateTime()
                                ->notNull()
                                ->defaultExpression('CURRENT_TIMESTAMP')
                                ->comment('Создано'),
                'updated'   => $this->dateTime()
                                ->notNull()
                                ->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                                ->comment('Обновлено')
            ],
            $tableOptions
        );
        $this->addForeignKey(
            "FK_{$prefix}image_blog_{$prefix}image_blog_group",
            '{{%blog_item}}',
            ['group_id'],
            '{{%blog_group}}',
            ['id']
        );
        $this->createTable(
            '{{%blog_gallery_link}}',
            [
                'blog_id'   => $this->integer(11)
                                ->notNull()
                                ->comment('Идентификатор блога'),
                'gallery_id'    => $this->integer(11)
                                ->notNull()
                                ->comment('Идентификатор галлереи')
            ],
            $tableOptions
        );
        $this->addPrimaryKey(
            "{$prefix}gallery_group_pk",
            '{{%blog_gallery_link}}',
            [
                'blog_id',
                'gallery_id',
            ]
        );
        $this->addForeignKey(
            "{$prefix}gallery_blog_id_fk",
            '{{%blog_gallery_link}}',
            ['blog_id'],
            '{{%blog_item}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            "{$prefix}gallery_groups_id_fk",
            '{{%blog_gallery_link}}',
            ['gallery_id'],
            'sw_gallery_group',
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
        $prefix=$this->db->tablePrefix;
        $this->dropForeignKey(
            "{$prefix}gallery_groups_id_fk",
            '{{%blog_gallery_link}}'
        );
        $this->dropForeignKey(
            "{$prefix}gallery_blog_id_fk",
            '{{%blog_gallery_link}}'
        );
        $this->dropTable(
             '{{%blog_gallery_link}}'
        );
        $this->dropTable('{{%blog_item}}');
        $this->dropTable('{{%blog_group}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210302_134747_blog_module_tables cannot be reverted.\n";

        return false;
    }
    */
}