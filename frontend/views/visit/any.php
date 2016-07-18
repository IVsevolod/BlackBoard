<?php


use yii\helpers\Html;

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/any.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerMetaTag([
    'name'    => 'keywords',
    'content' => 'система, сервис, купить, скрипт, обмена, визитами, показами, посещениями, бесплатная, раскрутка, сайтов, веб-сайтов, интернет-ресурсов',
], 'keywords');

$this->registerMetaTag([
    'name'    => 'description',
    'content' => "Система обмена визитами. Cервис для бесплатной раскрутки веб-сайтов. Купить скрипт обмена визитами для бесплатного продвижения интернет-ресурсов.",
], 'description');
?>
<h1>Обмен визитами</h1>
<p>Сервисы обмена визитами предназначены для увеличения посещаемости ваших сайтов. Для участия не требуется регистрация и оплата.</p>
<p>Просто впишите адресс Вашего сайта и нажимайте ">>>" (Старт). После просмотра сайтов других участников, Ваш сайт добавится в список для показа другим участникам сервиса.</p>
<p>После получения выбранного количества визитов (в зависимости от того, какой план показов вы выбрали - 3, 4, 5, ...), вы сможете снова добавить свой сайт в список.</p>
<?php

echo Html::label('Введите свой сайт');
echo Html::textInput('', 'http://', ['class' => 'form-control main-input']);

echo Html::a('Заполнить везде сайт', 'javascript:void(0)', ['class' => 'btn btn-default btn-set-all-url']);
echo Html::a('Раскрутить сайт!', 'javascript:void(0)', ['class' => 'btn btn-default btn-click-all']);
?>

<div class="row">
    <div class="col-md-3">
        <h3>1xnn.ru</h3>
        <form action="http://1xnn.ru/surf.html" method="POST" target="_blank" class="all-form-click">
            <input type="url" name="" value="" size="50" required="true" class="form-control url-input"
                   placeholder="url">
            <select name="plan" class="form-control">
                <option value="3">1x3</option>
                <option value="5">1x5</option>
                <option value="7">1x7</option>
                <option value="10">1x10</option>
                <option value="20">1x20</option>
                <option value="30">1x30</option>
                <option value="50">1x50</option>
                <option value="100">1x100</option>
                <option value="150">1x150</option>
            </select>
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>


    <div class="col-md-3">
        <h3>визитообмен.рф</h3>
        <form class="all-form-click" action="http://визитообмен.рф/mrs_viewlinks.php" method="post" target="_blank">
            <input name="url" value="" size="50" type="text" class="form-control url-input" placeholder="url">
            <select name="type" class="form-control">
                <option value="5">1x5</option>
                <option value="6">1x6</option>
                <option value="7">1x7</option>
                <option value="8">1x8</option>
                <option value="9">1x9</option>
                <option value="10">1x10</option>
                <option value="11">1x11</option>
                <option value="12">1x12</option>
                <option value="13">1x13</option>
                <option value="14">1x14</option>
                <option value="15">1x15</option>
                <option value="16">1x16</option>
                <option value="17">1x17</option>
                <option value="18">1x18</option>
                <option value="19">1x19</option>
                <option value="20">1x20</option>
                <option value="21">1x21</option>
                <option value="22">1x22</option>
                <option value="23">1x23</option>
            </select>
            <table class="tb1xn"></table>
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>seovisit.ru</h3>
        <form class="all-form-click" action="http://seovisit.ru/mrs_viewlinks.php" method="post" target="_blank">
            <input name="url" value="" size="50" type="text" class="form-control url-input" placeholder="url">
            <select name="type" class="form-control">
                <option value="3">1x3</option>
                <option value="5">1x5</option>
                <option value="7">1x7</option>
                <option value="10">1x10</option>
                <option value="12">1x12</option>
                <option value="15">1x15</option>
                <option value="20">1x20</option>
                <option value="25">1x25</option>
                <option value="30">1x30</option>
                <option value="35">1x35</option>
                <option value="40">1x40</option>
                <option value="45">1x45</option>
                <option value="50">1x50</option>
                <option value="75">1x75</option>
                <option value="100">1x100</option>
                <option value="150">1x150</option>
                <option value="200">1x200</option>
                <option value="250">1x250</option>
                <option value="300">1x300</option>
            </select>
            <table class="tb1xn"></table>
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>


    <div class="col-md-3">
        <h3>seo-surf.info</h3>
        <form class="all-form-click" action="http://seo-surf.info/mrs_viewlinks.php" method="post" target="_blank">
            <input name="url" value="" size="50" type="text" class="form-control url-input" placeholder="url">
            <select name="type" class="form-control">
                <option value="3">1x3</option>
                <option value="5">1x5</option>
                <option value="7">1x7</option>
                <option value="10">1x10</option>
                <option value="12">1x12</option>
                <option value="15">1x15</option>
                <option value="20">1x20</option>
                <option value="25">1x25</option>
                <option value="30">1x30</option>
                <option value="35">1x35</option>
                <option value="40">1x40</option>
                <option value="45">1x45</option>
                <option value="50">1x50</option>
                <option value="75">1x75</option>
                <option value="100">1x100</option>
                <option value="150">1x150</option>
                <option value="200">1x200</option>
                <option value="250">1x250</option>
                <option value="300">1x300</option>
            </select>
            <table class="tb1xn"></table>
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>seo-express.org</h3>
        <form class="all-form-click" action="http://seo-express.org/mrs_viewlinks.php" method="post" target="_blank">
            <input name="url" value="" size="50" type="text" class="form-control url-input" placeholder="url">
            <select name="type" class="form-control">
                <option value="3">1x3</option>
                <option value="4">1x4</option>
                <option value="5">1x5</option>
                <option value="6">1x6</option>
                <option value="7">1x7</option>
                <option value="8">1x8</option>
                <option value="9">1x9</option>
                <option value="10">1x10</option>
                <option value="11">1x11</option>
                <option value="12">1x12</option>
                <option value="13">1x13</option>
                <option value="14">1x14</option>
                <option value="15">1x15</option>
                <option value="20">1x20</option>
                <option value="25">1x25</option>
                <option value="30">1x30</option>
                <option value="35">1x35</option>
                <option value="40">1x40</option>
                <option value="45">1x45</option>
                <option value="50">1x50</option>
            </select>
            <table class="tb1xn"></table>
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>obmenvisit.ru</h3>
        <form class="all-form-click" id="w_11" method="POST" target="_blank"
              action="http://obmenvisit.ru/exchange-visits.php">
            <input type="text" name="site" size="50" value="" class="form-control url-input" placeholder="url">
            <select name="type" class="form-control">
                <option value="3">1x3</option>
                <option value="4">1x4</option>
                <option value="5">1x5</option>
                <option value="6">1x6</option>
                <option value="7">1x7</option>
                <option value="8">1x8</option>
                <option value="10">1x10</option>
                <option value="12">1x12</option>
                <option value="15">1x15</option>
                <option value="20">1x20</option>
                <option value="25">1x25</option>
                <option value="30">1x30</option>
                <option value="40">1x40</option>
                <option value="50">1x50</option>
            </select>
            <table class="tb1xn"></table>
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>mrtower.ru</h3>
        <form class="all-form-click" action="http://mrtower.ru/mrs_viewlinks.php" method="post" target="_blank">
            <input name="url" value="" size="50" type="text" class="form-control url-input" placeholder="url">
            <select name="type" class="form-control">
                <option value="3">1x3</option>
                <option value="5">1x5</option>
                <option value="7">1x7</option>
                <option value="10">1x10</option>
                <option value="12">1x12</option>
                <option value="15">1x15</option>
                <option value="20">1x20</option>
                <option value="25">1x25</option>
                <option value="30">1x30</option>
                <option value="35">1x35</option>
                <option value="40">1x40</option>
                <option value="45">1x45</option>
                <option value="50">1x50</option>
                <option value="75">1x75</option>
                <option value="100">1x100</option>
                <option value="150">1x150</option>
                <option value="200">1x200</option>
                <option value="250">1x250</option>
                <option value="300">1x300</option>
            </select>
            <table class="tb1xn"></table>
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>1xx.ru</h3>
        <form action="http://1xx.ru/go.php" method="post" target="_blank" class="all-form-click">
            <input name="url" type="text" size="50" value="" class="form-control url-input" placeholder="url">
            <input type="hidden" name="step" value="1">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>allvisits.ru</h3>
        <form action="http://allvisits.ru/?r=3" method="post" target="_blank" class="all-form-click">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>


    <div class="col-md-3">
        <h3>ave.aess.biz</h3>
        <form action="http://ave.aess.biz/?r=3" method="post" target="_blank" class="all-form-click">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>banerslot.ru</h3>
        <form action="http://banerslot.ru/?r=3" method="post" name="form1" target="_blank" class="all-form-click">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>bux.web-navigator.su</h3>
        <form action="http://bux.web-navigator.su/go.php" method="post" name="form1" target="_blank"
              class="all-form-click">
            <input type="text" name="url" value="" size="50" maxlength="253" class="form-control url-input"
                   placeholder="url">
            <input name="antigen" value="b04db9b07086dd9d9edf2526d6ec7a47" style="visibility: hidden; display: none"
                   readonly="">
            <input name="mode" value="1x3" style="visibility: hidden; display: none" readonly="">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>car-surfing.dollar-plus.info</h3>
        <form action="http://car-surfing.dollar-plus.info/?r=3" method="post" name="form1" target="_blank"
              class="all-form-click">
            <input name="serf" type="hidden" value="5">
            <input name="addurl" id="focus" size="50" type="text" value="" class="form-control url-input"
                   placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>doskabum.ru</h3>
        <form action="http://doskabum.ru/?serf=3" method="post" name="form1" target="_blank" class="all-form-click">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>ex-traff.ru</h3>
        <form action="http://ex-traff.ru/?serf=3" method="post" name="form1" target="_blank" class="all-form-click">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>exvisits.ru</h3>
        <form action="http://exvisits.ru/?plan=3" method="post" name="form1" target="_blank" class="all-form-click">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>fosso.ru</h3>
        <form class="all-form-click" action="http://fosso.ru/?r=4" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="4">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>free.pr0motion.ru</h3>
        <form class="all-form-click" action="http://free.pr0motion.ru/?serf=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>free-surf.cf</h3>
        <form class="all-form-click" action="http://www.free-surf.cf/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>gold-visits.ru</h3>
        <form class="all-form-click" action="http://gold-visits.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>good-visit.ru</h3>
        <form class="all-form-click" action="http://good-visit.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>host.plusinvest.ru</h3>
        <form class="all-form-click" action="http://host.plusinvest.ru/?serf=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>imklub.ru</h3>
        <form class="all-form-click" action="http://imklub.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>interbiss.ru</h3>
        <form class="all-form-click" action="http://interbiss.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>ketx.freehostia.com</h3>
        <form class="all-form-click" action="http://ketx.freehostia.com/3.php" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="5">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>kinibot.ru</h3>
        <form class="all-form-click" action="http://kinibot.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>laskma.megastart-slot.ru</h3>
        <form class="all-form-click" action="http://laskma.megastart-slot.ru/?serf=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>layn.vip-vizit.ru</h3>
        <form class="all-form-click" action="http://layn.vip-vizit.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>linksgroup.ru</h3>
        <form class="all-form-click" action="http://linksgroup.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>megasity.ru</h3>
        <form class="all-form-click" action="http://megasity.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>megavisit.ru</h3>
        <form class="all-form-click" action="http://megavisit.ru/?serf=5" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="5">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>my-visitors.ru</h3>
        <form class="all-form-click" action="http://my-visitors.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>my-vizit.ru</h3>
        <form class="all-form-click" action="http://my-vizit.ru/?serf=10" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>newbiss.ru</h3>
        <form class="all-form-click" action="http://newbiss.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>obmen.bzs.su</h3>
        <form class="all-form-click" action="http://obmen.bzs.su/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>obmen.site</h3>
        <form class="all-form-click" action="http://obmen.site/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>obmen.top-sar.ru</h3>
        <form class="all-form-click" action="http://obmen.top-sar.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>obmen-visits.ru</h3>
        <form class="all-form-click" action="http://obmen-visits.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>obmen-vizity.ru</h3>
        <form class="all-form-click" action="http://obmen-vizity.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>obmenseo.ru</h3>
        <form class="all-form-click" action="http://obmenseo.ru/?serf=5" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="5">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>obmenvizitomi.ru</h3>
        <form class="all-form-click" action="http://obmenvizitomi.ru/?serf=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>obvizit.ru</h3>
        <form class="all-form-click" action="http://obvizit.ru/?serf=5" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="5">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>obvizits.ru</h3>
        <form class="all-form-click" action="http://obvizits.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="5">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>p77716gi.bget.ru</h3>
        <form class="all-form-click" action="http://p77716gi.bget.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>posetitelplus.ru</h3>
        <form class="all-form-click" action="http://posetitelplus.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>posjet.ru</h3>
        <form class="all-form-click" action="http://posjet.ru/?r=5" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="5">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>pr0motion.ru</h3>
        <form class="all-form-click" action="http://pr0motion.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>raszar.ru</h3>
        <form class="all-form-click" action="http://raszar.ru/viza/index.php?r=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>realsar.ru</h3>
        <form class="all-form-click" action="http://realsar.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>reklama.megastart-slot.ru</h3>
        <form class="all-form-click" action="http://reklama.megastart-slot.ru/?serf=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>reklboard.ru</h3>
        <form class="all-form-click" action="http://reklboard.ru/index.php?mode=3" method="post" target="_blank">
            <input name="url" value="" size="50" type="text" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>retab.ru</h3>
        <form class="all-form-click" action="http://retab.ru/?serf=10" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>rm-reklama.ru</h3>
        <form class="all-form-click" action="http://rm-reklama.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>s.vip-vizit.ru</h3>
        <form class="all-form-click" action="http://s.vip-vizit.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>seo.bizsait.pw</h3>
        <form class="all-form-click" action="http://seo.bizsait.pw/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>seo.megastart-slot.ru</h3>
        <form class="all-form-click" action="http://seo.megastart-slot.ru/?serf=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>seo.sborka-s.ru</h3>
        <form class="all-form-click" action="http://seo.sborka-s.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>seo-form.ru</h3>
        <form class="all-form-click" action="http://seo-form.ru/index.php?mode=5" method="post" target="_blank">
            <input name="url" value="" size="50" type="text" class="form-control url-input" placeholder="url">
            <input name="serf" type="hidden" value="5">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>seoclub.in.ua</h3>
        <form class="all-form-click" action="http://seoclub.in.ua/index.php?mode=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>seotitan.ru</h3>
        <form class="all-form-click" action="http://seotitan.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>


    <div class="col-md-3">
        <h3>seovizits.ru</h3>
        <form class="all-form-click" action="http://seovizits.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>sistema.comeze.com</h3>
        <form class="all-form-click" action="http://sistema.comeze.com/go.php" method="post" name="form1"
              target="_blank">
            <input value="" size="50" name="url" class="form-control url-input" placeholder="url">
            <input name="antigen" value="b04db9b07086dd9d9edf2526d6ec7a47" style="visibility: hidden; display: none"
                   readonly="">
            <input name="mode" value="1x3" style="visibility: hidden; display: none" readonly="">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>wekon.ru</h3>
        <form class="all-form-click" action="http://wekon.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>vip-vizit.ru</h3>
        <form class="all-form-click" action="http://vip-vizit.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" style="margin-right: 0; padding-right: 0;" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>visits.0fees.net</h3>
        <form class="all-form-click" action="http://visits.0fees.net/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" style="margin-right: 0; padding-right: 0;" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>visit.wwwserv.ru</h3>
        <form class="all-form-click" action="http://visit.wwwserv.ru/go.php?c=3" method="post" name="form1"
              target="_blank">
            <input size="50" name="url" value="" type="text" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>viza.byethost10.com</h3>
        <form class="all-form-click" action="http://viza.byethost10.com/?serf=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" style="margin-right: 0; padding-right: 0;" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>vizit.hhos.ru</h3>
        <form class="all-form-click" action="http://vizit.hhos.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>vizit.salary24.ru</h3>
        <form class="all-form-click" action="http://vizit.salary24.ru/?serf=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" style="margin-right: 0; padding-right: 0;" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>vizit.seo-bug.ru</h3>
        <form class="all-form-click" action="http://vizit.seo-bug.ru/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>vizit.super-birds.ru</h3>
        <form class="all-form-click" action="http://vizit.super-birds.ru/?r=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>vizit.topvizit.ru</h3>
        <form class="all-form-click" action="http://www.vizit.topvizit.ru/?r=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>vizit.uxp.ru</h3>
        <form class="all-form-click" action="http://vizit.uxp.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>webmasteru.in.ua</h3>
        <form class="all-form-click" action="http://webmasteru.in.ua/?serf=3" method="post" name="form1"
              target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>wikiholod.ru</h3>
        <form class="all-form-click" action="http://wikiholod.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>wmrmega.ru/vizit</h3>
        <form class="all-form-click" action="http://wmrmega.ru/vizit/?r=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>/wmwiz.ru</h3>
        <form class="all-form-click" action="http://wmwiz.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>wwrf.ru</h3>
        <form class="all-form-click" action="http://wwrf.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>x10web.ru</h3>
        <form class="all-form-click" action="http://x10web.ru/?serf=5" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="5">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>youraise.ru</h3>
        <form class="all-form-click" action="http://youraise.ru/surf3.html" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="url" value="" id="urladres" size="50" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>zemerov.ru</h3>
        <form class="all-form-click" action="http://zemerov.ru/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-3">
        <h3>мосвизит.рф</h3>
        <form class="all-form-click" action="http://мосвизит.рф/?serf=3" method="post" name="form1" target="_blank">
            <input name="serf" type="hidden" value="3">
            <input name="addurl" size="50" type="text" value="" class="form-control url-input" placeholder="url">
            <input type="submit" value="Раскрутить" class="btn btn-default">
        </form>
    </div>

</div>