<?php
/**
 * @var Ads $ads
 */

use common\models\Ads;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Объявление';

$this->params['breadcrumbs'][] = $this->title;

$keywords = $ads->extract_keywords(strip_tags($ads->description));
$this->registerMetaTag([
    'name'    => 'keywords',
    'content' => $keywords,
], 'keywords');

$this->registerMetaTag([
    'name'    => 'description',
    'content' => $ads->description . '. Телефон: ' . $ads->phone,
], 'description');

$city = $ads->citym;
?>
<div id="item-header">
    <h1><?= $ads->getTitle() ?></h1>
    <?php
    if (!empty($city)) {
        echo "<b>Город</b>: " . $city->name . "<br/>";
    }
    ?>
    <b>Телефон</b>: <?= strip_tags($ads->phone) ?><br/>
    <?php
    if (!empty($ads->price)) {
        echo "<b>Цена</b>: " . $ads->price . "<br/>";
    }
    ?>
    <p>
        <?= nl2br(strip_tags($ads->description)) ?>
    </p>
</div>