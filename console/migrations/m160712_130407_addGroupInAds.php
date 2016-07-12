<?php

use yii\db\Schema;
use yii\db\Migration;

class m160712_130407_addGroupInAds extends Migration
{
    public function up()
    {
        $this->addColumn('{{%ads}}', 'group', Schema::TYPE_INTEGER . ' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%ads}}', 'group');
    }

}
