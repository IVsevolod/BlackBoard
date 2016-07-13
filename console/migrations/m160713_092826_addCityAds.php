<?php

use yii\db\Schema;
use yii\db\Migration;


class m160713_092826_addCityAds extends Migration
{
    public function up()
    {

        $this->addColumn('{{%ads}}', 'city', Schema::TYPE_INTEGER . ' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%ads}}', 'city');
    }

}
