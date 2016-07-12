<?php
/**
 * @var Ads $ads
 */

use common\models\Ads;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Объявление';

$this->params['breadcrumbs'][] = $this->title;

?>
<div id="item-header">
    <h1><?= $ads->getTitle() ?></h1>
    <p>
        <?= strip_tags($ads->description) ?>
    </p>
    <b>Телефон</b>: <?= strip_tags($ads->phone) ?>
</div>