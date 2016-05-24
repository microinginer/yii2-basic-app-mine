<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Handles the creation for table `post_tag_assn_table`.
 */
class m160523_202523_create_post_tag_assn_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%post_tag_assn}}', [
            'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'tag_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addPrimaryKey('', '{{%post_tag_assn}}', ['post_id', 'tag_id']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
