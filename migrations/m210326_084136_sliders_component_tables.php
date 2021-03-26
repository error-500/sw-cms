<?php

use yii\db\Migration;

/**
 * Class m210326_084136_sliders_component_tables
 */
class m210326_084136_sliders_component_tables extends Migration
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
            "{{%slider_group}}",
            [
                'id'        => $this->primaryKey()
                                    ->comment('Идентификатор'),
                'tech_name' => $this->string(50)
                                    ->notNull()
                                    ->defaultValue('default_named')
                                    ->comment('Техническое наименование (латиница и _)'),
                'name'      => $this->string(50)
                                    ->notNull()
                                    ->defaultValue('Без названия')
                                    ->comment('Наименование'),
                'text'      => $this->text()
                                    ->null()
                                    ->comment('Описание'),
                'created'   => $this->dateTime()
                                    ->notNull()
                                    ->defaultExpression('CURRENT_TIMESTAMP'),
                'updated'   => $this->dateTime()
                                    ->notNull()
                                    ->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            $tableOptions
        );
        $this->createTable(
            "{{%slider_item}}",
            [
                'id'        => $this->primaryKey()
                                    ->comment('Идентификатор'),
                'group_id'  => $this->integer(11)
                                    ->null()
                                    ->comment('Идентификатор группы'),
                'pos'       => $this->integer(11)
                                    ->notNull()
                                    ->defaultValue(0)
                                    ->comment('Позиция в списке'),
                'active'    => $this->integer(1)
                                    ->notNull()
                                    ->defaultValue(1)
                                    ->comment("Опубликовано"),
                'img'       => $this->string(50)
                                    ->null()
                                    ->comment('Изображение'),
                'href'      => $this->string(50)
                                    ->null()
                                    ->comment('Ссылка'),
                'alt'       => $this->string(200)
                                    ->null()
                                    ->comment('Коментарий к изображению (alt SEO)'),
                'title'     => $this->string(200)
                                    ->null()
                                    ->comment('Заголовок'),
                'text'      => $this->text()
                                    ->null()
                                    ->comment('Текс слайдера'),
                'created'   => $this->dateTime()
                                    ->notNull()
                                    ->defaultExpression('CURRENT_TIMESTAMP'),
                'updated'   => $this->dateTime()
                                    ->notNull()
                                    ->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
            ],
            $tableOptions
        );
        $this->addForeignKey(
            "{$prefix}slider_item_link_slider_block_fk",
            '{{%slider_item}}',
            ['group_id'],
            "{{%slider_group}}",
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
            "{$prefix}slider_item_link_slider_block_fk",
            '{{%slider_item}}'
        );
        $this->dropTable('{{%slider_item}}');
        $this->dropTable('{{%slider_block}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210326_084136_sliders_component_tables cannot be reverted.\n";

        return false;
    }
    */
}