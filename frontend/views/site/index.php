<?php
/**
 * @var yii\web\View $this
 * @var string $alias
 * @var int $cityId
 */

use common\models\City;
use common\models\Group;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/index.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("var alias = '" . htmlspecialchars($alias) . "';", View::POS_HEAD);
$this->registerJs("var cityId = " . (empty($cityId) ? "0" : $cityId) . ";", View::POS_HEAD);

$this->title = 'Доска объявлений';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <form class="form-inline margin-bottom">
                <div class="form-group">
                    <label class="">Категория: </label>
                    <?= Html::dropDownList('group', $alias, Group::getAllCategories(), [
                        'prompt'          => 'Все',
                        'class'           => 'form-control select-all-group',
                        'data-url'        => Url::to(['site/index']),
                        'data-bboard-url' => Url::to(['/bboards']),
                        'data-main-url'   => Url::to(['/']),
                    ]) ?>
                </div>
                <label>Город: </label>
                <?= Html::dropDownList('city', $cityId, City::getCities(), [
                    'prompt'          => 'Все',
                    'class'           => 'form-control select-all-city',
                    'data-url'        => Url::to(['site/index']),
                    'data-bboard-url' => Url::to(['/bboards']),
                    'data-main-url'   => Url::to(['/']),
                ]) ?>
            </form>
            <div class="block-bboard" data-last-id="-1" data-load-url="<?= Url::to(['bboard/load']) ?>">

            </div>

            <?= Html::a('Показать еще объявлений', $alias, ['class' => 'btn btn-link load-bboard']) ?>
            <hr/>

            <?= Html::a('Добавить объявление', ['advert/create'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
