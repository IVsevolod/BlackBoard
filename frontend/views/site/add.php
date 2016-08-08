<?php
/**
 * @var Ads $ads
 */

use common\models\Ads;
use common\models\City;
use common\models\Group;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Добавление объявления';

$this->params['breadcrumbs'][] = $this->title;


$this->registerMetaTag([
    'name'    => 'keywords',
    'content' => "подать объявление, подать объявление бесплатно, разместить объявление, разместить объявление бесплатно",
], 'keywords');

$this->registerMetaTag([
    'name'    => 'description',
    'content' => "Доска объявлений Sdrd - подать объявление бесплатно о товаре либо услуге",
], 'description');
?>
<div id="item-header">
    <h1>Добавить объявление</h1>
    <div class="alert alert-success">
        <b>Sdrd</b> – это сайт, где Вы можете разместить объявление бесплатно. Вам не нужно тратить время на регистрацию. Для того, чтобы подать объявление на доске <a href="http://sdrd.ru">Sdrd.ru</a>, заполните все необходимые поля на этой странице. Размещение информации о предлагаемых товарах и услугах абсолютно бесплатное
    </div>
</div>
<div>
    <div class="row">
        <div class="col-lg-9">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($ads, 'group')->dropDownList(Group::getHierarchy(false), [
                'prompt'   => 'Все',
                'class'    => 'form-control select-all-group',
                'data-url' => \yii\helpers\Url::to(['site/index']),
            ])->label('Категория') ?>
            <?= $form->field($ads, 'city')->dropDownList(City::getCities(false), [
                'prompt'   => 'Все',
                'class'    => 'form-control select-all-group',
                'data-url' => \yii\helpers\Url::to(['site/index']),
            ])->label('Город') ?>
            <a href="javascript: (function() {$('.new-city-block').removeClass('hide'); $('.link-add-city').hide(); })();" class="link-add-city margin-bottom">Моего города нет</a>
            <div class="new-city-block hide">
            <label>Добавить город</label>
            <?= Html::textInput('cityText', '', ['class' => 'form-control']) ?>
            </div>
            <?= $form->field($ads, 'title')->label('Заголовок') ?>
            <?= $form->field($ads, 'price')->label('Цена') ?>
            <?= $form->field($ads, 'phone')->label('Телефон') ?>
            <?= $form->field($ads, 'type')->dropDownList(Ads::getAllTypes(), ['prompt' => 'Все'])->label('Тип') ?>
            <?= $form->field($ads, 'description')->textarea()->label('Описание') ?>

            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
