<?php
/**
 * @var yii\web\View $this
 * @var string $alias
 * @var int $cityId
 * @var string $cityAlias
 * @var Group $group
 * @var string $type
 * @var ActiveDataProvider $dataProvider
 */

use common\models\Ads;
use common\models\City;
use common\models\Group;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ListView;
use yii\widgets\Pjax;

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

$cities = City::getCities(false);
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

$allTypes = Ads::getAllTypes();
if (!empty($type)) {
    $url = Url::to(['/bboards']) . (empty($cityId) ? "/0" : "/" . $cityId) . "/" . $alias . "/" . $type;
    $this->params['breadcrumbs'][] = ['label' => $allTypes[$type], 'url' => $url];
    $keywords[] = $allTypes[$type];
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
            <div class="col-md-8">
                <form class="form-inline margin-bottom">
                    <div class="form-group">
                        <label>Город: </label>
                        <?= Html::dropDownList('city', $cityAlias, City::getCities(), [
                            'prompt'          => 'Все',
                            'class'           => 'form-control select-all-city',
                            'data-url'        => Url::to(['site/index']),
                            'data-bboard-url' => Url::to(['/bboards']),
                            'data-main-url'   => Url::to(['/']),
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <label class="">Категория: </label>
                        <?= Html::dropDownList('group', $alias, Group::getHierarchy(), [
                            'prompt'          => 'Все',
                            'class'           => 'form-control select-all-group',
                            'data-url'        => \yii\helpers\Url::to(['site/index']),
                            'data-bboard-url' => Url::to(['/bboards']),
                            'data-main-url'   => Url::to(['/']),
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <label class="">Тип: </label>
                        <?= Html::dropDownList('type', $type, $allTypes, [
                            'prompt'          => 'Все',
                            'class'           => 'form-control select-all-type',
                            'data-url'        => Url::to(['site/index']),
                            'data-bboard-url' => Url::to(['/bboards']),
                            'data-main-url'   => Url::to(['/']),
                        ]) ?>
                    </div>
                </form>

                <?php
                Pjax::begin([
                    'enablePushState'    => false, // to disable push state
                    'enableReplaceState' => false, // to disable replace state
                ]);
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView'     => '_list',
                    'layout'       => "{items}\n{pager}\n<hr/>{summary}",
                    'separator'    => '<hr/>',
                    'options'      => [
                        'id' => 'news-list',
                    ],
                ]);
                Pjax::end();
                ?>

                <hr/>

                <?= Html::a('Добавить объявление', ['advert/create'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>

<div>
    <h3>О проекте Sdrd.ru</h3>

    <p>
        Доска бесплатных объявлений - сайт для бесплатного размещения своих объявлений!
    </p>
</div>
