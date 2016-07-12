<?php
/**
 * @var Ads $ads
 */

use common\models\Ads;
use common\models\Group;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Добавление объявления';

$this->params['breadcrumbs'][] = $this->title;

?>
<div id="item-header">
    <h1>Добавить объявление</h1>
</div>
<div>
    <div class="row">
        <div class="col-lg-9">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($ads, 'group')->dropDownList(Group::getHierarchy(false), [
                'prompt' => 'Все',
                'class' => 'form-control select-all-group',
                'data-url' => \yii\helpers\Url::to(['site/index']),
            ] )->label('Категория') ?>
            <?= $form->field($ads, 'title')->label('Заголовок') ?>
            <?= $form->field($ads, 'phone')->label('Телефон') ?>
            <?= $form->field($ads, 'description')->textarea()->label('Описание') ?>

            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
