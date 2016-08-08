<?php
/**
 * @var Ads $model
 */

use common\models\Ads;


?>
<div class="row">
    <div class="col-md-12">
        <h3 class="news-list-item__title"><?= $model->title ?></h3>
        <?php if (!empty($model->price)) { ?>
            <b class="pull-right text-success"><?= $model->price ?> руб.</b>
        <?php } ?>
        <div>
            <?= $model->getShortDescription() ?>
        </div>
        <?= \yii\helpers\Html::a(
            'Подробнее',
            $model->getUrl()
        ) ?>
    </div>
</div>
