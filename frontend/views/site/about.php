<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/about.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = 'О сайте';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Доска бесплатных объявлений - сайт для бесплатного размещения своих объявлений!</p>

    <p>Объявление можете разместить <?= Html::a('по адресу', ['advert/create']) ?></p>

    <p>Чтобы просмотреть все объявления перейдите <?= Html::a('по ссылке', ['/']) ?></p>
</div>
