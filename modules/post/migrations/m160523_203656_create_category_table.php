<?php

use yii\db\Migration;

/**
 * Handles the creation for table `category_table`.
 */
class m160523_203656_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute("CREATE TABLE `category` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `created_at` int(11) NOT NULL,
          `updated_at` int(11) NOT NULL,
          `user_id` int(11) NOT NULL,
          `name` char(250) NOT NULL DEFAULT '',
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {

    }
}
