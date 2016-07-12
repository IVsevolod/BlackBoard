<?php
namespace common\models;

use common\models\User;
use frontend\models\Lang;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Url;
use yii\web\IdentityInterface;

/**
 * ads model
 *
 * @property integer     $id
 * @property string      $title
 * @property string      $description
 * @property string      $phone
 * @property int         $show_count
 * @property string      $alias
 * @property int         $deleted
 * @property integer     $date_update
 * @property integer     $date_create
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
            [['date_update', 'date_create'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 10000],
            [['phone'], 'string', 'max' => 30],
        ];
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

    // функция превода текста с кириллицы в траскрипт
    function encodestring($str)
    {
        $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
        return str_replace($rus, $lat, $str);
    }

    function toAscii($str, $replace = array(), $delimiter = '-')
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
                $title = $this->encodestring($title);
                $alias = $this->toAscii($title);
                $baseAlias = substr($alias, 0, 150);
                $alias = $baseAlias;
                $wheres = ['alias = :alias'];
                $params[':alias'] = $alias;
                if (!is_null($this->id)) {
                    $wheres[] = 'id <> :id';
                    $params = [':id' => $this->id];
                }
                $where = join(' AND ', $wheres);
                if ($findSchool = Ads::find()->where($where, $params)->one()) {
                    $alias = $baseAlias . '-' . Ads::find()->max('id');
                }
                $this->alias = $alias;
            }
            return true;
        }
        return false;
    }

    public function getUrl($scheme = false, $addParams = [])
    {
        if ($this->alias) {
            $params = ['ads', 'alias' => $this->alias];
            $params = array_merge($params, $addParams);
            return Url::to($params, $scheme);
        } else {
            $params = ['school/view', 'index' => $this->id];
            $params = array_merge($params, $addParams);
            return Url::to($params, $scheme);
        }
    }


    public function addReputation($addReputation)
    {
        $user = User::thisUser();
        $modelUserId = $this->user_id;
        $paramsSelf = [
            'entity' => self::THIS_ENTITY,
            'schoolId' => $this->id,
            'userId' => $user->id,
        ];
        $paramsOther = [
            'entity' => self::THIS_ENTITY,
            'schoolId' => $this->id,
            'userId' => $modelUserId,
        ];

        if ($addReputation == VoteModel::ADD_REPUTATION_CANCEL_UP) {
            // - хозяину события за отмену лайка
            Reputation::addReputation($modelUserId, Reputation::ENTITY_VOTE_LIKE_SELF_SCHOOL_CANCEL, $paramsSelf);
        } elseif ($addReputation == VoteModel::ADD_REPUTATION_UP) {
            // + хозяину события за лайк
            Reputation::addReputation($modelUserId, Reputation::ENTITY_VOTE_LIKE_SELF_SCHOOL, $paramsSelf);
            // Если раньше не было оценки, пользователь ставит лайк и его репутация маленькая, тогда добавим ему репутации
            if ($user->reputation < self::MAX_REPUTATION_FOR_ADD_REPUTATION_SCHOOL_VOTE_LIKE &&
                $user->reputation > self::MIN_REPUTATION_FOR_ADD_REPUTATION_SCHOOL_VOTE_LIKE
            ) {
                // + текущему пользователю за лайк
                Reputation::addReputation($user->id, Reputation::ENTITY_VOTE_LIKE_OTHER_SCHOOL, $paramsOther);
            }
        } elseif ($addReputation == VoteModel::ADD_REPUTATION_CANCEL_DOWN) {
            // + хозяину события за отмену дизлайка
            Reputation::addReputation($modelUserId, Reputation::ENTITY_VOTE_DISLIKE_SELF_SCHOOL_CANCEL, $paramsSelf);
            // + текущему пользователю за отмену дизлайка
            Reputation::addReputation($user->id, Reputation::ENTITY_VOTE_DISLIKE_OTHER_SCHOOL_CANCEL, $paramsOther);
        } elseif ($addReputation == VoteModel::ADD_REPUTATION_DOWN) {
            // - хозяину события за дизлайк
            Reputation::addReputation($modelUserId, Reputation::ENTITY_VOTE_DISLIKE_SELF_SCHOOL, $paramsSelf);
            // - текущему пользователю за дизлайк
            Reputation::addReputation($user->id, Reputation::ENTITY_VOTE_DISLIKE_OTHER_SCHOOL, $paramsOther);
        }
    }

    public function getCountry()
    {
        $country = null;
        if (!empty($this->country)) {
            $country = Countries::findOne(['id' => $this->country]);
        }
        return $country;
    }

    public function getCountryText()
    {
        $country = $this->getCountry();
        if (!empty($country)) {
            $lang = Lang::$current->url;
            return $country->getLangCountries($lang);
        }
        return "";
    }

    public function getCity()
    {
        return htmlspecialchars($this->city);
    }

    public function getCountryCityText()
    {
        $countryText = $this->getCountryText();
        $city = $this->getCity();
        $countryCityText = $countryText;
        if (!empty($countryText) && !empty($city)) {
            $countryCityText .= ", ";
        }
        $countryCityText .= $city;
        if (empty($countryCityText)) {
            $countryCityText = " - ";
        }
        return $countryCityText;
    }
}
