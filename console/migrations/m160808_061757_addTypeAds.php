<?php

use yii\db\Schema;
use yii\db\Migration;

class m160808_061757_addTypeAds extends Migration
{
    public function up()
    {
        $this->addColumn('{{%ads}}', 'type', Schema::TYPE_STRING . ' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%ads}}', 'type');
    }
}
