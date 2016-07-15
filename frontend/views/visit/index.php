<?php
/**
 *
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$base = __DIR__ . "/base.txt";
?>

<?= Html::beginForm('', 'POST', ['target' => '_blank']); ?>
<h3>Взаимный обмен визитами</h3>
<?php

    echo Html::label('URL страницы');
    echo Html::textInput('url', 'http://', ['class' => 'form form-control', 'size' => 25]);
    echo Html::label('Тип генератора посещений');

    $file = file($base);
    $opt = [];
    for ($i=0; $i<sizeof($file); $i++) {
        $line = explode("^^", $file[$i]);
        $opt[$line[0]] = '1x' . $line[0];
    }
    echo Html::dropDownList('type', 3, $opt, ['class' => 'form-control']);
    echo "<br/>";
    echo Html::submitInput('Добавить', ['class' => 'btn btn-success', 'name' => 'first']);

    echo Html::endForm()
?>
