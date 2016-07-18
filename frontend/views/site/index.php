<?php
/**
 * @var yii\web\View $this
 * @var string $alias
 * @var int $cityId
 * @var Group $group
 */

use common\models\City;
use common\models\Group;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/index.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("var alias = '" . htmlspecialchars($alias) . "';", View::POS_HEAD);
$this->registerJs("var cityId = " . (empty($cityId) ? "0" : $cityId) . ";", View::POS_HEAD);

$this->title = 'Доска бесплатных объявлений';

$description = "Объявление на sdrd.ru. Доска бесплатных объявлений. Подать объявление";

$keywords = [
    'доска объявлений',
    'объявления',
    'Бесплатные объявления',
    'Подать объявление',
    'Все объявления',
];

$cities = City::getCities();
if ($cityId == 0) {
    $url = Url::to(['/bboards']) . "/0" . (empty($alias) ? "" : "/" . $alias);
    $this->params['breadcrumbs'][] = ['label' => "Все города", 'url' => $url];
} else {
    $url = Url::to(['/bboards']) . "/" . $cityId . (empty($alias) ? "" : "/" . $alias);
    $this->params['breadcrumbs'][] = [
        'label' => isset($cities[$cityId]) ? $cities[$cityId] : 'Город',
        'url'   => $url,
    ];
    $description .= " в городе " . $cities[$cityId];
    $keywords[] = 'Объявления ' . $cities[$cityId];
    $keywords[] = 'Бесплатные объявления ' . $cities[$cityId];
}
$description .= ".";

if (empty($group)) {
    $url = Url::to(['/bboards']) . (empty($cityId) ? "/0" : "/" . $cityId);
    $this->params['breadcrumbs'][] = ['label' => "Все категории", 'url' => $url];
} else {
    $url = Url::to(['/bboards']) . (empty($cityId) ? "/0" : "/" . $cityId) . "/" . $alias;
    $this->params['breadcrumbs'][] = ['label' => $group->title, 'url' => $url];
    $keywords[] = $alias;
}
$this->params['breadcrumbs'][] = 'Объявления';


$this->registerMetaTag([
    'name'    => 'keywords',
    'content' => join(', ', $keywords),
], 'keywords');

$this->registerMetaTag([
    'name'    => 'description',
    'content' => $description,
], 'description');

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
                <?= Html::dropDownList('city', $cityId, $cities, [
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

<div>
    <h3>О проекте Sdrd.ru</h3>

    <p>
        Доска бесплатных объявлений - сайт для бесплатного размещения своих объявлений!
    </p>
</div>
