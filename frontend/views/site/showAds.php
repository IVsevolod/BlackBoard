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
?>
<div id="item-header">
    <h1><?= $ads->getTitle() ?></h1>
    <p>
        <?= strip_tags($ads->description) ?>
    </p>
    <b>Телефон</b>: <?= strip_tags($ads->phone) ?>
</div>