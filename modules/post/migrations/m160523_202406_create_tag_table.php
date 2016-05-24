<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Handles the creation for table `tag_table`.
 */
class m160523_202406_create_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%tag}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'frequency' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
        ]);
    }


    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
