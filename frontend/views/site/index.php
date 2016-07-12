<?php
/**
 * @var yii\web\View $this
 * @var string $alias
 */

use common\models\Group;
use yii\helpers\Html;
use yii\web\View;

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/index.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("var alias = '" . htmlspecialchars($alias) . "';", View::POS_HEAD);

$this->title = 'Доска объявлений';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?= Html::dropDownList('group', $alias, Group::getHierarchy(), [
                'prompt' => 'Все',
                'class' => 'form-control select-all-group',
                'data-url' => \yii\helpers\Url::to(['site/index']),
            ] ) ?>
            <div class="block-bboard" data-last-id="-1">

            </div>

            <?= Html::a('Показать еще объявлений', $alias, ['class' => 'btn btn-link load-bboard']) ?><hr/>

            <?= Html::a('Добавить объявление', ['advert/create'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
