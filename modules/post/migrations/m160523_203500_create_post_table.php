<?php

use yii\db\Migration;

/**
 * Handles the creation for table `post_table`.
 */
class m160523_203500_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute("CREATE TABLE `post` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `created_at` int(11) DEFAULT NULL,
          `updated_at` int(11) DEFAULT NULL,
          `user_id` int(11) DEFAULT NULL,
          `name` varchar(1000) NOT NULL DEFAULT '',
          `description` text,
          `full_content` text,
          `slug` varchar(1000) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
