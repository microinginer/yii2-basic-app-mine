<?php

use yii\db\Migration;

/**
 * Handles the creation for table `post_category_table`.
 */
class m160523_203803_create_post_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute("CREATE TABLE `post_category` (
          `post_id` int(11) NOT NULL,
          `category_id` int(11) NOT NULL,
          KEY `post_id` (`post_id`),
          KEY `category_id` (`category_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {

    }
}
