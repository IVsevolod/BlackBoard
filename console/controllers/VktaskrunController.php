<?php

namespace console\controllers;

use common\models\Vkpost;
use common\models\VkTaskRun;
use yii\console\Controller;
use yii\db\Expression;

class VktaskrunController extends Controller
{
    public $defaultAction = 'init';

    public function actionInit()
    {
        $vkTaskRun = VkTaskRun::find()->orderBy('time')->one();
        if (empty($vkTaskRun) || ($vkTaskRun->time < strtotime('+ 120 min', time()) )) {
            $access_token = '395e815c1b25c9ab7d1b99195bf754364a96a025437cd8c4379faf8d977088779ae98e2c569f5197e711b';
            $vkapi = \Yii::$app->vkapi;
            $vkapi->initAccessToken($access_token);
            $vkposts = Vkpost::find()
                ->where(['category' => 'happy'])
                ->orderBy(new Expression('rand()'))
                ->limit(7)
                ->all();

            $group_id = '40768668';
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

                $response = $vkapi->vkPostFromModel($group_id, $datestart, $vkpost);

                $interval = rand(25, 45);
                if ($response) {
                    $vknewtaskrun = new VkTaskRun();
                    $vknewtaskrun->time = $datestart;
                    $vknewtaskrun->group_id = $group_id;
                    $vknewtaskrun->save();
                    $datestart = strtotime(' + ' . $interval . ' min', $datestart);
                }

            }

        }
    }
}