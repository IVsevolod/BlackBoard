<?php

use yii\db\Schema;
use yii\db\Migration;

class m160712_074119_addGroupTable extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%group}}', [
            'id'          => Schema::TYPE_PK,
            'title'       => Schema::TYPE_STRING . '(255) NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'parent'      => Schema::TYPE_INTEGER . ' NOT NULL',
            'alias'       => Schema::TYPE_STRING . ' NOT NULL',
            'show_count'  => Schema::TYPE_INTEGER . ' NOT NULL',
            'deleted'     => Schema::TYPE_BOOLEAN . ' DEFAULT 0 NOT NULL',
            'date_update' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date_create' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%group}}');
    }
}
