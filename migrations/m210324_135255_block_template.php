<?php

use yii\db\Migration;

/**
 * Class m210324_135255_block_template
 */
class m210324_135255_block_template extends Migration
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
            "{{%block_template}}",
            [
                'id'        => $this->primaryKey()
                                    ->comment("Идентификатор"),
                'name'      => $this->string(255)
                                    ->notNull()
                                    ->defaultValue('Без названия')
                                    ->comment('Наименование шаблона'),
                'params'    => $this->json()
                                    ->notNull()
                                    ->defaultValue('{}')
                                    ->comment('Список переменных шаблона'),
                'path'      => $this->string(255)
                                    ->notNull()
                                    ->defaultValue('index')
                                    ->comment('Путь к файлу шаблона')
            ],
            $tableOptions
        );
        $this->createTable(
            "{{%block_link_template}}",
            [
                'block_id'      => $this->integer()
                                        ->notNull()
                                        ->comment('Идентификатор блока'),
                'template_id'   => $this->integer()
                                        ->notNull()
                                        ->comment('Идентификатор шаблона'),
                'template_vars' => $this->json()
                                        ->notNull()
                                        ->defaultValue('{}')
                                        ->comment('Значения переменных шаблона'),
            ],
            $tableOptions
        );
        $this->addPrimaryKey(
            "{$prefix}block_link_tpl_pk",
            "{{%block_link_template}}",
            [
                'block_id',
                'template_id',
            ]
        );
        $this->addForeignKey(
            "{$prefix}block_link_tpl_fk",
            "{{%block_link_template}}",
            [
                'block_id',
            ],
            "{{%block_item}}",
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            "{$prefix}tpl_link_block_fk",
            "{{%block_link_template}}",
            [
                'template_id',
            ],
            "{{%block_template}}",
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
            "{$prefix}tpl_link_block_fk",
            "{{%block_link_template}}"
        );
        $this->dropForeignKey(
            "{$prefix}block_link_tpl_fk",
            "{{%block_link_template}}",
        );
        $this->dropTable("{{%block_link_template}}");
        $this->dropTable("{{%block_template}}");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210324_135255_block_template cannot be reverted.\n";

        return false;
    }
    */
}