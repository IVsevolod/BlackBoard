<?php

use yii\db\Schema;
use yii\db\Migration;

class m160722_052249_AddColumnPrice extends Migration
{
    public function up()
    {
        $this->addColumn('{{%ads}}', 'price', Schema::TYPE_INTEGER . ' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%ads}}', 'price');
    }
}
