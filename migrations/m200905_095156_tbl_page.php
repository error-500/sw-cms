<?php

use yii\db\Migration;

class m200905_095156_tbl_page extends Migration
{
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE `page`  (
              `id` int NOT NULL AUTO_INCREMENT,
              `tech_name` varchar(255) NOT NULL,
              `active` tinyint(1) NOT NULL DEFAULT 1,
              `title` varchar(255) NULL,
              `subtitle` varchar(255) NULL,
              `text` mediumtext NULL,
              `media` varchar(255) NULL,
              `seo_title` varchar(255) NULL,
              `seo_description` varchar(255) NULL,
              `seo_keys` varchar(255) NULL,
              `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`),
              INDEX(`tech_name`)
            );
        ");
    }

    public function safeDown()
    {
        $this->dropTable('page');
        
        return true;
    }
}
