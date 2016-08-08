<?php
/**
 * @var Ads $model
 */

use common\models\Ads;


?>
<div class="row">
    <div class="col-md-12">
        <h3 class="news-list-item__title"><?= $model->title ?></h3>
        <span class="pull-right text-right">
            <?= !empty($model->price) ? "<b class='text-success'>" . $model->price . " руб.</b>" : "Цена не указана" ?>
            <br/>
            <i class="text-muted">
                <span class="glyphicon glyphicon-eye-open"></span>
                <?= $model->show_count ?>
            </i>
        </span>
        <div>
            <?= $model->getShortDescription() ?>
        </div>
        <?= \yii\helpers\Html::a(
            'Подробнее',
            $model->getUrl()
        ) ?>
    </div>
</div>
