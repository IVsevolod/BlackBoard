<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * group model
 *
 * @property integer     $id
 * @property string      $title
 * @property string      $description
 * @property integer     $parent
 * @property int         $show_count
 * @property string      $alias
 * @property int         $deleted
 * @property integer     $date_update
 * @property integer     $date_create
 */
class Group extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
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

    public function getUrl($scheme = false, $addParams = [])
    {
        $params = ['site/showgroup', 'alias' => $this->alias];
        $params = array_merge($params, $addParams);
        return Url::to($params, $scheme);
    }


    public static function getAllGroup()
    {
        static $allGroups;
        if (empty($allGroups)) {
            $allGroup = Group::find()->andWhere('deleted = 0')->all();
            $allGroups = [];
            foreach ($allGroup as $group) {
                $allGroups[$group->id] = $group;
            }
        }
        return $allGroups;
    }

    public static function getParents()
    {
        static $parents;
        if (empty($parents)) {
            $parents = [];
            $allGroup = self::getAllGroup();
            foreach ($allGroup as $group) {
                $parents[$group->parent][] = $group;
            }
        }
        return $parents;
    }

    public static function getHierarchy($aliasId = true) {
        $options = [];

        $parents = self::getParents();
        foreach($parents[0] as $p) {
            $child_options = [];
            if (!empty($parents[$p->id])) {
                foreach($parents[$p->id] as $child) {
                    $key = $aliasId ? $child->alias : $child->id;
                    $child_options[$key] = $child->title;
                }
                $key = $aliasId ? $p->alias : $p->id;
                $options[$p->title] = $child_options;
            }
        }
        return $options;
    }

    public static function getAllCategories($aliasId = true) {
        $options = [];

        $parents = self::getParents();
        foreach($parents[0] as $p) {
            if (!empty($parents[$p->id])) {
                foreach($parents[$p->id] as $child) {
                    $key = $aliasId ? $child->alias : $child->id;
                    $options[$key] = $child->title;
                }
            }
        }

        return $options;
    }
}
