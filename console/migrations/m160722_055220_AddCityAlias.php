<?php

use yii\db\Schema;
use yii\db\Migration;

class m160722_055220_AddCityAlias extends Migration
{

    public function up()
    {
        $this->addColumn('{{%city}}', 'alias', Schema::TYPE_STRING . ' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%ads}}', 'alias');
    }
}
