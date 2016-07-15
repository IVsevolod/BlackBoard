<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Visit controller
 */
class VisitController extends Controller
{

    const VISIT_SELF_SITE = 'http://sdrd.ru/';

    public function actionIndex()
    {
        $base = __DIR__ . "/../views/visit/base.txt";
        if (Yii::$app->request->isPost && Yii::$app->request->post('timer') == '>>>') {


            $request = Yii::$app->request;
            $data = $request->post();
            $url = $data['url'];
            $type = $data['type'];
            $file = file($base);
            for ($i = 0; $i < sizeof($file); $i++) {
                $line = explode("^^", $file[$i]);
                if ($line[0] == $type) {
                    for ($j = $line[0]; $j >= 2; $j--) {
                        $line[$j] = $line[$j - 1];
                    }
                    $line[1] = $url;
                }
                $file[$i] = implode("^^", $line);
                $file[$i] = str_replace("^^^^", "^^", $file[$i]);
                $file[$i] = str_replace("^^\n", "\n", $file[$i]);
                $file[$i] = trim($file[$i]) . "\n";
            }
            $fp = fopen($base, "w");
            for ($j = 0; $j < sizeof($file); $j++) {
                fputs($fp, $file[$j]);
            }
            fclose($fp);

            echo "<center><h1>Ваш сайт успешно добавлен!</h1></center>";
            echo "<p>Вы можете закрыть окно</p>";
            exit;
        }

        if (Yii::$app->request->isPost && Yii::$app->request->post('first')) {
            // Check
            $url = Yii::$app->request->post('url');
            $type = Yii::$app->request->post('type');
            $url = htmlspecialchars($url);
            $url = strtolower($url);
            $url = preg_quote($url);
            $ErrUrl = "http://www.ya.ru/ http://www.yandex.ru/";
            if (mb_strpos($url, $ErrUrl) !== false) {
                $this->redirect(['visit/index']);
            }
            $file = file($base);
            for ($i = 0; $i < sizeof($file); $i++) {
                $line = explode("^^", $file[$i]);
                if ($line[0] == $type) {
                    $line2 = implode("^^", $line);
                    if (mb_strpos($url, $line2) !== false) exit("<h3>Данный URL уже занесен в базу. Попытайтесь попозже.</h3>");
                }
            }
            $url = stripslashes($url);
            if (!preg_match("<^http://[^\.]+\..+>", $url) || preg_match("/[а-я]/", $url)) exit("<h3>Неверно введен URL</h3>");

            // set_my_url
            $file = file($base);
            for ($i = 0; $i < sizeof($file); $i++) {
                $line = explode("^^", $file[$i]);
                for ($j = $line[0]; $j >= 1; $j--) {
                    $line[$j] = trim($line[$j]);
                    if (empty($line[$j])) $line[$j] = self::VISIT_SELF_SITE;
                }
                $file[$i] = implode("^^", $line) . "\n";
            }
            $fp = fopen($base, "w");
            for ($j = 0; $j < sizeof($file); $j++) {
                fputs($fp, $file[$j]);
            }
            fclose($fp);

            // show sites
            return $this->render('/visit/show', ['type' => $type, 'url' => $url]);
        }

        return $this->render('index');
    }

    public function actionBottom()
    {
        return $this->render('bottom');
    }
}