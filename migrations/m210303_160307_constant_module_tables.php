<?php

use yii\db\Migration;

/**
 * Class m210303_160307_constant_module_tables
 */
class m210303_160307_constant_module_tables extends Migration
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
            '{{%constant_item}}',
            [
                'id' => $this->primaryKey()
                    ->comment('Идентификатор'),
                'active' => $this->tinyInteger(1)
                    ->notNull()
                    ->defaultValue('1')
                    ->comment('Опубликовано'),
                'name' => $this->string(50)
                    ->notNull()
                    ->comment('Название'),
                'tech_name' => $this->string(50)
                    ->unique()
                    ->notNull()
                    ->comment('Техническое название'),
                'value' => $this->text()
                    ->notNull(),

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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%constant_item}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210303_160307_constant_module_tables cannot be reverted.\n";

        return false;
    }
    */
}
