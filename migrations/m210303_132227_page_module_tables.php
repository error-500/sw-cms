<?php

use yii\db\Migration;

/**
 * Class m210303_132227_page_module_tables
 */
class m210303_132227_page_module_tables extends Migration
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
            '{{%page_item}}',
            [
                'id'            => $this->primaryKey()
                                    ->comment('Идентификатор'),
                'tech_name'     => $this->string(255)
                                    ->notNull()
                                    ->comment('Техническое наименование'),
                'img'           => $this->string(50)
                                    ->null()
                                    ->comment('Изображение'),
                'title'         => $this->string(200)
                                    ->notNull()
                                    ->comment('Заголовок'),
                'description'   => $this->text()
                                    ->null()
                                    ->comment('Описание'),
                'keywords'      => $this->text()
                                    ->null()
                                    ->comment('Описание'),
                'text'          => $this->text()
                                    ->null()
                                    ->comment('Текст'),
                'created'       => $this->dateTime()
                                    ->notNull()
                                    ->defaultExpression('CURRENT_TIMESTAMP')
                                    ->comment('Создано'),
                'updated'       => $this->dateTime()
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
        $this->dropTable('{{%page_item}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210303_132227_page_module_tables cannot be reverted.\n";

        return false;
    }
    */
}