<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Доска объявлений';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">

            <?= Html::a('Добавить объявление', ['advert/create'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
