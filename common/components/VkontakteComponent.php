<?php


namespace common\components;


use common\models\Vkpost;
use yii\base\Component;

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
            'offset'   => $offset,
            'count'    => $limit,
            'owner_id' => '',
            'domain'   => '',
        ];
        if (empty($groupId)) {
            $params['owner_id'] = -$groupId;
        } else {
            $params['domain'] = $groupName;
        }

        return $this->api('wall.get', $params);
    }

    /**
     * @param int $groupId
     * @param int $publishDate
     * @param Vkpost $vkpost
     * @param string[] $tags
     *
     * @return \stdClass
     */
    public function vkPostFromModel($groupId, $publishDate, $vkpost, $tags)
    {

        $text = $vkpost->text;
        $breaks = array("<br />","<br>","<br/>");
        $text = str_ireplace($breaks, "\r\n", $text);

        $attachments = $vkpost->attachments;
        if (empty($attachments)) {
            $attachments = "";
        } else {
            $attachmentsObj = json_decode($attachments, true);
            $attachments = [];
            foreach ($attachmentsObj as $value) {
                $valueData = $value[$value['type']];
                if (isset($value['type']) && isset($valueData['owner_id']) && isset($valueData['pid'])) {
                    $attachments[] = $value['type'] . $valueData['owner_id'] . '_' . $valueData['pid'];
                }
            }
            $attachments = join(',', $attachments);
        }
        if (!empty($tags)) {
            $text .= "\n\n";

            foreach ($tags as $tag) {
                $text .= ' #' . str_replace(' ', '_', $tag);
            }
        }
        $params = [
            'owner_id'     => -$groupId,
            'message'      => $text,
            'from_group'   => 1,
            'publish_date' => $publishDate,
            'guid'         => date('Ym') . $vkpost->post_id,
            'attachments'  => $attachments,
        ];

        return $this->apiPost('wall.post', $params);
    }

}