<?php
/**
 * Created by PhpStorm.
 * User: seva_
 * Date: 15.07.2016
 * Time: 9:57
 */

$request = Yii::$app->request;
$data = $request->get();
$url = $data[1]['url'];
$type = $data[1]['type'];
$wait_time = 5;
?>
    <html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"
            integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script language="JavaScript">
        var entered = new Date();
    </script>
</head>
<body>

<p class="small"><font color="red"><b>Нажмите на кнопку по истечении времени</b></font>
    <?= \yii\helpers\Html::beginForm(['visit/index'], 'POST', ['name' => 'time']) ?>
    <input name="timer" maxlength=8 size=4 value="?" class="form">
    <input type="submit" style="display: none" value="Жмите!" name="submit" class="form submit-btn">
    <input type="hidden" value="<?= $type; ?>" name="type">
    <input type="hidden" value="<?= $url; ?>" name="url">
    <?= \yii\helpers\Html::endForm() ?>
    <script language="JavaScript">
        function track() {
            var now = new Date();
            var seconds = <?=$wait_time + (round(1.25 * $type));?> -Math.floor((now.getTime() - entered.getTime()) / 1000);
            if (seconds <= 0) {
                seconds = ">>>"
            }
            document.time.timer.value = seconds;
            if (seconds > 0) {
                val_submit = "Подождите"
            } else {
                $('.submit-btn').show();
                $('input[name="timer"]').attr('type', 'hidden');
                val_submit = "Жмите";
            }
            document.time.submit.value = val_submit;
            var timeID = setTimeout("track()", 1000);
        }
        $(document).ready(function () {
            track();
        });
    </script>
</body>
<?php
exit;