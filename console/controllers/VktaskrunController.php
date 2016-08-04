<?php

namespace console\controllers;

use common\models\Vkpost;
use common\models\VkTaskRun;
use yii\console\Controller;
use yii\db\Expression;

class VktaskrunController extends Controller
{
    public $defaultAction = 'init';

    private function runTask($access_token, $group_id, $category, $tags)
    {
        $vkTaskRun = VkTaskRun::find()->andWhere(['group_id' => $group_id])->orderBy('time desc')->one();
        if (empty($vkTaskRun) || ($vkTaskRun->time < strtotime('+ 120 min', time()) )) {
            $vkapi = \Yii::$app->vkapi;
            $vkapi->initAccessToken($access_token);
            $vkposts = Vkpost::find()
                ->where(['category' => $category])
                ->orderBy(new Expression('rand()'))
                ->limit(11)
                ->all();

            $interval = rand(25, 45);
            if (empty($vkTaskRun)) {
                $datestart = strtotime(' + ' . $interval . ' min', time());
            } else {
                $datestart = strtotime(' + ' . $interval . ' min', $vkTaskRun->time);
            }
            foreach ($vkposts as $vkpost) {
                if ($datestart < time()) {
                    $datestart = strtotime('+7 min', time());
                }

                $response = $vkapi->vkPostFromModel($group_id, $datestart, $vkpost, $tags);

                $interval = rand(25, 45);
                if ($response) {
                    $vknewtaskrun = new VkTaskRun();
                    $vknewtaskrun->time = $datestart;
                    $vknewtaskrun->group_id = $group_id;
                    $vknewtaskrun->save();
                    $datestart = strtotime(' + ' . $interval . ' min', $datestart);
                } else {
                    var_dump($response);
                    break;
                }

            }

        }
    }

    public function actionInit()
    {
        $access_token = '395e815c1b25c9ab7d1b99195bf754364a96a025437cd8c4379faf8d977088779ae98e2c569f5197e711b';
        $this->runTask($access_token, '40768668', ['happy', 'video'], ['happy', 'my_home_happy', 'для_души']);
        $this->runTask($access_token, '124470635', ['humor', 'gif', 'video'], ['humor','анекдоты', 'приколы', 'юмор']);

    }
}