<?php
namespace frontend\controllers;

use common\models\Ads;
use common\models\City;
use common\models\Group;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow'   => true,
                        'roles'   => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', ['alias' => "", 'cityId' => "0"]);
    }

    public function actionBboardcity($city)
    {
        return $this->render('index', ['alias' => "", 'cityId' => $city]);
    }

    public function actionBboard($alias, $city)
    {
        $group = Group::findOne(['alias' => $alias]);
        if (!empty($group)) {
            $group->addShowCount();
            $group->save();
        }
        return $this->render('index', ['alias' => $alias, 'cityId' => $city]);
    }

    public function actionLoadadvert()
    {
        $request = Yii::$app->request;
        $alias = $request->post('alias');
        $cityId = $request->post('city');
        $lastId = $request->post('lastId');
        $find = Ads::find()->orderBy('id DESC')->limit(20);
        if ($lastId >= 0) {
            $find = $find->andWhere('id < :id', [':id' => $lastId]);
        }
        if (!empty($alias)) {
            $group = Group::findOne(['alias' => $alias]);
            if (!empty($group)) {
                $find = $find->andWhere('`group` = :group', [':group' => $group->id]);
            }
        }
        if (!empty($cityId)) {
            $find = $find->andWhere('`city` = :cityId', [':cityId' => $cityId]);
        }
        $adss = $find->all();
        $result = [];
        $cities = [];
        foreach ($adss as $ads) {
            /** @var Ads $ads */
            $cityName = "";
            if ($ads->city > 0) {
                if (isset($cities[$ads->city])) {
                    $cityName = $cities[$ads->city];
                } else if ($city = $ads->citym) {
                    $cityName = $city->name;
                    $cities[$ads->city] = $cityName;
                }
            }
            $result[] = [
                'id'          => $ads->id,
                'city'        => $cityName,
                'title'       => $ads->getTitle(),
                'description' => nl2br(strip_tags($ads->description)),
                'phone'       => strip_tags($ads->phone),
                'href'        => $ads->getUrl(),
            ];
        }

        return json_encode($result);
    }

    public function actionCreateadvert()
    {
        $ads = new Ads();
        if ($ads->load(Yii::$app->request->post())) {
            $ads->description = \yii\helpers\HtmlPurifier::process($ads->description, []);
            $ads->show_count = 0;
            $ads->group = (int)Yii::$app->request->post('Ads')['group'];
            $cityText = Yii::$app->request->post('cityText');
            if (!empty($cityText)) {
                $city = City::find()->andWhere('name = :name', [':name' => $cityText])->one();
                if (empty($city)) {
                    $city = new City();
                    $city->name = $cityText;
                    if ($city->save()) {
                        $ads->city = $city->id;
                    }
                } else {
                    $ads->city = $city->id;
                }
            }
            if (empty($ads->city)) {
                $ads->city = 0;
            }

            if ($ads->save()) {
                return Yii::$app->getResponse()->redirect($ads->getUrl());
            }
        }

        return $this->render(
            'add',
            ['ads' => $ads]
        );
    }

    public function actionShowadvert($alias)
    {
        $ads = Ads::findOne(['alias' => $alias]);
        $ads->addShowCount();
        $ads->save();

        return $this->render(
            'showAds',
            ['ads' => $ads]
        );
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

}
