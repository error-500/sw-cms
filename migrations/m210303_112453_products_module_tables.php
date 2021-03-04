<?php

use yii\db\Migration;

/**
 * Class m210303_112453_products_module_tables
 */
class m210303_112453_products_module_tables extends Migration
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
            '{{%product_group}}',
            [
                'id'    => $this->primaryKey()
                        ->comment('Идентификатор'),
                'parent_id' => $this->integer(11)
                                ->null()
                                ->comment('Идетификатор родительской группы'),
                'pos'    => $this->integer(11)
                            ->notNull()
                            ->defaultValue(0)
                            ->comment('Позиция для сортировки'),
                'tech_name' => $this->string(255)
                            ->notNull()
                            ->comment('Техническое наименование'),
                'img'       => $this->string(255)
                                ->null()
                                ->comment('Изображение'),
                'name'      => $this->string(255)
                                    ->notNull()
                                    ->comment('Наименование'),
                'text'      => $this->text()
                                    ->null()
                                    ->comment('Описание группы'),
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
            "{$prefix}product_group_ibfk_1",
            '{{%product_group}}',
            ['parent_id'],
            '{{%product_group}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->createTable(
            '{{%product_item}}',
            [
                'id'        => $this->primaryKey()
                            ->comment('Идентификатор'),

                'group_id'  => $this->integer(11)
                                    ->notNull()
                                    ->comment('Идентификатор группы'),
                'is_delivery'    => $this->tinyInteger(1)
                                    ->notNull()
                                    ->defaultValue(0)
                                    ->comment('Доставка'),
                'pos'    => $this->integer(11)
                            ->notNull()
                            ->defaultValue(0)
                            ->comment('Позиция для сортировки'),
                'name'      => $this->string(255)
                                    ->null()
                                    ->comment('Название'),
                'price'       => $this->float()
                                    ->null()
                                    ->comment('Цена'),
                'img'       => $this->string(255)
                                ->null()
                                ->comment('Изображение'),
                'volume'    => $this->string(255)
                                    ->null()
                                    ->comment('Объем/Вес'),
                'consist'   => $this->text()
                                    ->null()
                                    ->comment('Состав'),
                'about'     => $this->text()
                                    ->null()
                                    ->comment('Описание'),
                'created'   => $this->dateTime()
                                ->notNull()
                                ->defaultExpression('CURRENT_TIMESTAMP')
                                ->comment('Создано'),
                'updated'   => $this->dateTime()
                                ->notNull()
                                ->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                                ->comment('Обновлено'),
            ],
            $tableOptions
        );
        $this->addForeignKey(
            "{$prefix}product_item_ibfk_1",
            '{{%product_item}}',
            ['group_id'],
            '{{%product_group}}',
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
            "{$prefix}product_item_ibfk_1",
            '{{%product_item}}'
        );
        $this->dropForeignKey(
            "{$prefix}product_group_ibfk_1",
            '{{%product_group}}'
        );
        $this->dropTable('{{%product_group}}');
        $this->dropTable('{{%product_item}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210303_112453_products_module_tables cannot be reverted.\n";

        return false;
    }
    */
}