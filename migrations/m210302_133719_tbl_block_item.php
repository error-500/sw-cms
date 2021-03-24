<?php

use yii\db\Migration;

/**
 * Class m210302_133719_tbl_block_item
 */
class m210302_133719_tbl_block_item extends Migration
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
            '{{%block_item}}',
            [
                'id' => $this->primaryKey()
                            ->comment('Идентификатор'),
                'tech_name' => $this->string(200)
                            ->notNull()
                            ->comment('Техническое название'),
                'img' => $this->string(50)
                            ->comment('Картинка'),
                'title' => $this->string(200)
                            ->notNull()
                            ->comment('Заголовок'),
                'text' => $this->text()
                            ->comment('Текст'),
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
        $this->dropTable('{{%block_item}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210302_133719_tbl_block_item cannot be reverted.\n";

        return false;
    }
    */
}