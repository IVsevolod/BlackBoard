<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * city model
 *
 * @property integer     $id
 * @property string      $name
 */
class City extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    public function getName()
    {
        return strip_tags($this->name);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [];
    }

    public static function getCities()
    {
        $cities = City::find()->all();
        $allCity = [];
        foreach ($cities as $city) {
            /** @var City $city */
            $allCity[$city->id] = $city->getName();
        }
        return $allCity;
    }

}
