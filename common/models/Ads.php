<?php
namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * ads model
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $phone
 * @property int $show_count
 * @property string $alias
 * @property integer $group
 * @property int $deleted
 * @property int $city
 * @property int $price
 * @property string $type
 * @property integer $date_update
 * @property integer $date_create
 *
 * @property City $citym
 */
class Ads extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
    }

    public function getTitle()
    {
        return strip_tags($this->title);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class'      => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'default', 'value' => ''],
            [['date_update', 'date_create', 'city', 'price'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 10000],
            [['phone'], 'string', 'max' => 30],
            [['type'], 'string'],
        ];
    }

    public static function getAllTypes()
    {
        return [
            'sell'    => 'Покупка',
            'buy'     => 'Продажа',
            'service' => 'Услуга',
        ];
    }


    public function getShortDescription($length = 200, $end = '...')
    {
        $charset = 'UTF-8';
        $token = '~';
        $description = $this->description;
        $str = $description;
        $str = strip_tags($str);
        $str = nl2br($str);
        $str = preg_replace('/\s+/', ' ', $str);
        if (mb_strlen($str, $charset) >= $length) {
            $wrap = wordwrap($str, $length, $token);
            $str_cut = mb_substr($wrap, 0, mb_strpos($wrap, $token, 0, $charset), $charset);
            $str_cut .= $end;
            return $str_cut;
        } else {
            return $str;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [];
    }

    public function addShowCount()
    {
        $this->show_count++;
        $this->save();
    }


    public function extract_keywords($str, $minWordLen = 3, $minWordOccurrences = 1, $asArray = false)
    {
        $str = preg_replace('/[^\p{L}0-9 ]/u', ' ', $str);
        $str = trim(preg_replace('/\s+/u', ' ', $str));

        $words = explode(' ', $str);
        $keywords = [];
        while (($c_word = array_shift($words)) !== null) {
            if (strlen($c_word) < $minWordLen) continue;

            $c_word = strtolower($c_word);
            if (array_key_exists($c_word, $keywords)) $keywords[$c_word][1]++;
            else $keywords[$c_word] = [$c_word, 1];
        }
        usort($keywords, function ($first, $sec) {
            return $sec[1] - $first[1];
        });

        $final_keywords = [];
        foreach ($keywords as $keyword_det) {
            if ($keyword_det[1] < $minWordOccurrences) break;
            array_push($final_keywords, $keyword_det[0]);
        }
        return $asArray ? $final_keywords : implode(', ', $final_keywords);
    }

    // функция превода текста с кириллицы в траскрипт
    function encodestring($str)
    {
        $rus = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
        $lat = ['A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya'];
        return str_replace($rus, $lat, $str);
    }

    function toAscii($str, $replace = [], $delimiter = '-')
    {
        $str = trim($str);
        if (!empty($replace)) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->alias == "") {
                $title = trim($this->title);
                if (empty($title)) {
                    $title = trim($this->description);
                }
                $this->title = substr($title, 0, 100);
                $title = $this->encodestring($title);
                $alias = $this->toAscii($title);
                $baseAlias = substr($alias, 0, 150);
                $alias = $baseAlias;
                if (empty($alias)) {
                    $alias = Ads::find()->max('id') + 1;
                }
                $wheres = ['alias = :alias'];
                $params[':alias'] = $alias;
                if (!is_null($this->id)) {
                    $wheres[] = 'id <> :id';
                    $params = [':id' => $this->id];
                }
                $where = join(' AND ', $wheres);
                if ($findSchool = Ads::find()->where($where, $params)->one()) {
                    $alias = $baseAlias . '-' . (Ads::find()->max('id') + 1);
                }
                $this->alias = $alias;
            }
            return true;
        }
        return false;
    }

    public function getUrl($scheme = false, $addParams = [])
    {
        $params = ['site/showadvert', 'alias' => $this->alias];
        $params = array_merge($params, $addParams);
        return Url::to($params, $scheme);
    }

    public function getCitym()
    {
        return $this->hasOne(City::className(), ['id' => 'city']);
    }

    public static function getDataProvider($alias, $city, $type)
    {
        $find = Ads::find()->andWhere(['deleted' => 0])->orderBy('date_create');
        if (!empty($alias)) {
            $group = Group::findOne(['alias' => $alias]);
            if (!empty($group)) {
                $find = $find->andWhere('`group` = :group', [':group' => $group->id]);
            }
        }

        if (!empty($city)) {
            $mcity = City::find()->andWhere('`alias` = :cityAlias OR `id` = :cityId', [':cityAlias' => $city, ':cityId' => (int)$city])->one();
            $find = $find->andWhere('`city` = :cityId', [':cityId' => $mcity->id]);
        }

        if (!empty($type)) {
            $find = $find->andWhere('`type` = :type', [':type' => $type]);
        }

        $dataProvider = new ActiveDataProvider([
            'query'      => $find,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $dataProvider;
    }
}
