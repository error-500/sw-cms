<?php

use yii\db\Migration;

/**
 * Class m210303_103605_gallery_module_tables
 */
class m210302_103605_gallery_module_tables extends Migration
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
            '{{%gallery_group}}',
            [
                'id'    => $this->primaryKey()
                        ->comment('Идентификатор'),
                'active'    => $this->tinyInteger(1)
                            ->notNull()
                            ->defaultValue(1)
                            ->comment('Активно'),
                'tech_name' => $this->string(255)
                            ->notNull()
                            ->comment('Техническое наименование'),
                'img'       => $this->string(255)
                                ->null()
                                ->comment('Изображение'),
                'name'      => $this->string(255)
                                    ->notNull()
                                    ->comment('Наименование'),
               'created' => $this->dateTime()
                                ->notNull()
                                ->defaultExpression('CURRENT_TIMESTAMP')
                                ->comment('Создано'),
                'updated' => $this->dateTime()
                                ->notNull()
                                ->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                                ->comment('Обновлено'),
            ],
            $tableOptions
        );
        $this->createTable(
            '{{%gallery_item}}',
            [
                'id'        => $this->primaryKey()
                            ->comment('Идентификатор изображения'),
                'active'    => $this->tinyInteger(1)
                                    ->notNull()
                                    ->defaultValue(1)
                                    ->comment('Активно'),
                'group_id'  => $this->integer(11)
                                    ->notNull()
                                    ->comment('Идентификатор группы'),
                'name'      => $this->string(255)
                                    ->null()
                                    ->comment('Название файла изображения'),
                'alt'       => $this->string(255)
                                    ->null()
                                    ->comment('Альтернативный текст'),
                'created' => $this->dateTime()
                                ->notNull()
                                ->defaultExpression('CURRENT_TIMESTAMP')
                                ->comment('Создано'),
                'updated' => $this->dateTime()
                                ->notNull()
                                ->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                                ->comment('Обновлено'),
            ],
            $tableOptions
        );
        $this->addForeignKey(
            "{$prefix}gallery_item_ibfk_1}}",
            '{{%gallery_item}}',
            ['group_id'],
            '{{%gallery_group}}',
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
        $this->dropForeignKey(
            '{{%gallery_item_ibfk_1}}',
            '{{%gallery_item}}'
        );
        $this->dropTable(
            '{{%gallery_item}}'
        );
        $this->dropTable(
           '{{%gallery_group}}'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210303_103605_gallery_module_tables cannot be reverted.\n";

        return false;
    }
    */
}
