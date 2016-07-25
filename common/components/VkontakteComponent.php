<?php


namespace common\components;


use BW\Vkontakte;
use yii\base\Component;

require_once __DIR__ . '\vkontakte\Vkontakte.php';

class VkontakteComponent extends Vkontakte
{


    public function init()
    {
        parent::init();

    }

    public function __construct($config = [])
    {
        if (isset($config['accessToken'])) {
            $this->setAccessToken($config['accessToken']);
        }
    }

    public function saveImg($url)
    {
        $tmpfname = tempnam("/tmp", "FOO");

        $handle = fopen($tmpfname, "w");
        fwrite($handle, file_get_contents($url));
        fclose($handle);

        return $tmpfname;
    }

    public function initAccessToken($accessToken)
    {
        $this->setAccessToken(json_encode(['access_token' => $accessToken]));
    }

    public function vkPost($publickId)
    {
        $vkAPI = new \BW\Vkontakte(['access_token' => $this->accessToken]);
        $urlImg = $this->saveImg('http://brazilianzouk.ru/img/logo.png');
        if ($vkAPI->postToPublic($publickId, "Привет Хабр!", $urlImg, [])) {
            unlink($urlImg);
            return true;
        } else {
            unlink($urlImg);
            return false;
        }
    }

    public function vkGet($groupId, $groupName, $offset, $limit)
    {
        $params = [
            'offset' => $offset,
            'count'  => $limit,
            'owner_id' => '',
            'domain' => '',
        ];
        if (empty($groupId)) {
            $params['owner_id'] = -$groupId;
        } else {
            $params['domain'] = $groupName;
        }

        return $this->api('wall.get', $params);
    }

}