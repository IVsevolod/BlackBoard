<?php
namespace frontend\controllers;

use common\components\VkontakteComponent;
use common\models\Vkpost;
use Yii;
use yii\web\Controller;

/**
 * Visit controller
 */
class VkController extends Controller
{

    public function actionIndex()
    {


        return $this->render('index');
    }

    public function actionLoad()
    {
        $request = Yii::$app->getRequest();
        $access_token = empty($request->post('access_token')) ? '' : $request->post('access_token');
        $group_id = empty($request->post('group_id')) ? '' : $request->post('group_id');
        $group_name = empty($request->post('group_name')) ? '' : $request->post('group_name');
        $offset = empty($request->post('offset')) ? '0' : $request->post('offset');
        $limit = empty($request->post('limit')) ? '50' : $request->post('limit');
        $category = empty($request->post('category')) ? '' : $request->post('category');
        $vkpostsSave = [];
        if ($request->isPost) {
            /** @var VkontakteComponent $vkapi */
            $vkapi = Yii::$app->vkapi;
            $vkapi->initAccessToken($access_token);
            $vkposts = $vkapi->vkGet($group_id, $group_name, $offset, $limit);

            $count = array_shift($vkposts);
            while (count($vkposts) > 0) {
                $vkpostItem = array_shift($vkposts);

                $vkpost = new Vkpost();
                $vkpost->post_id = $vkpostItem->id;
                $vkpost->owner_id = isset($vkpostItem->owner_id) ? $vkpostItem->owner_id : 0;
                $vkpost->from_id = $vkpostItem->from_id;
                $vkpost->date = $vkpostItem->date;
                $vkpost->post_type = $vkpostItem->post_type;
                $vkpost->text = $vkpostItem->text;
                if (isset($vkpostItem->attachments)) {
                    $vkpost->attachments = json_encode($vkpostItem->attachments);
                }
                $vkpost->category = $category;

                if ($vkpost->save()) {
                    $vkpostsSave[] = $vkpost;
                }
            }
        }

        return $this->render(
            'load',
            [
                'access_token' => $access_token,
                'group_id'     => $group_id,
                'group_name'   => $group_name,
                'offset'       => $offset,
                'limit'        => $limit,
                'category'     => $category,
                'vkpostsSave'  => $vkpostsSave,
            ]
        );
    }

}