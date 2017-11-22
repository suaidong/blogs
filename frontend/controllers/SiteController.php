<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use frontend\models\SignupForm;
use frontend\models\PasswordResetRequestForm;
use app\common\models\ContactForm;
use common\models\admin\Article;
use common\models\Comment;
use common\models\User;
use common\models\admin\Message;
use common\models\admin\Diary;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    //博客首页
    public function actionIndex()
    {
        $this->layout="new";
        $res=new Article();
         //获取评论列表内容
        $con=new Comment();
       
        $li=$con->listss('3');
        //获取文章列表
        $list=$res->lists('id','0');

        $pages = new Pagination(['totalCount' =>$list->count(), 'pageSize' => '8']);
        $list = $list->offset($pages->offset)->limit($pages->limit)->all();
         if(is_array($list)){
        foreach ($list as $key => $value) {
              $list[$key]['content']=mb_substr(strip_tags($value['content']),'0','120','utf-8')."......";
            }
        }
        //print_r($list);
        //获取点击排行
        $order=$res->lists('view',"0")->asarray()->all();
        //获取热门推荐
        $recom=$res->reclist();
        return $this->render('index',[
            'list'  =>  $list,
            'li'    =>  $li,
            'order' =>  $order,
            'recom' =>  $recom,
            'pages' =>  $pages,
            ]);
    }
     //学无止境
    public function actionStudy()
    {
        $this->layout="new";
        $res=new Article();
         //获取评论列表内容
        $con=new Comment();
       
        $li=$con->listss('3');
        //获取文章列表
        $list=$res->lists('id','2');

        $pages = new Pagination(['totalCount' =>$list->count(), 'pageSize' => '8']);
        $list = $list->offset($pages->offset)->limit($pages->limit)->all();
         if(is_array($list)){
        foreach ($list as $key => $value) {
              $list[$key]['content']=mb_substr(strip_tags($value['content']),'0','120','utf-8')."......";
            }
        }
        //print_r($list);
        //获取点击排行
        $order=$res->lists('view',"2")->asarray()->all();
        //获取热门推荐
        $recom=$res->reclist();
        return $this->render('study',[
            'list'  =>  $list,
            'li'    =>  $li,
            'order' =>  $order,
            'recom' =>  $recom,
            'pages' =>  $pages,
            ]);
    }

    public function actionGame(){
        $this->layout="new";
       return  $this->render('game');
    }

    //文章详情

    public function actionDetial()
    {
        //判断是否存在session
        $session = \Yii::$app->session;
        if(Yii::$app->user->isGuest==1){
            $username="0";
            $ress=array();
        }else{
            $username=Yii::$app->user->identity->username;
            $id=Yii::$app->user->identity->id;
            $ress=User::find()->where('id='.$id)->asarray()->one();
        }
        $id=$_GET['id'];
        //获取评论列表内容
        $con=new Comment();
        $li=$con->lists($id,'100');

        $this->layout="new";
        $res=new Article();
        $z=$res->views($id);
        $list=$res->detial($id);

        foreach ($li as $key => $value) {
           $li[$key]['re']=$con->relist($value['id']);
        }
        //print_r($li);
        // exit();
        return $this->render('detial',[
            'list'  =>  $list,
            'username'  =>$username,
            'ress'=>$ress,
            'li'    =>$li,
            ]);
    }

    //获取评论内容
    public function actionComment(){
        $res=Yii::$app->request->get();
        $content=$res['content'];
        $artic_id=$res['artic_id'];
        $user_id=Yii::$app->user->identity->id;
        $comment=new Comment();

        $comment->content=$content;
        $comment->article_id=$artic_id;
        $comment->user_id=$user_id;
        $comment->username=Yii::$app->user->identity->username;
        $comment->time=time();

       if($comment->save() > 0){ 
             return 1;
        }else{ 
             return 0;
        }  
    }
    //获取评论内容回复
    public function actionComments(){
        $res=Yii::$app->request->get();
        $content=$res['content'];
        $artic_id=$res['artic_id'];
        $pid=$res['pid'];
        $user_id=Yii::$app->user->identity->id;
        $comment=new Comment();

        $comment->content=$content;
        $comment->pid=$pid;
        $comment->article_id=$artic_id;
        $comment->user_id=$user_id;
        $comment->username=Yii::$app->user->identity->username;
        $comment->time=time();

       if($comment->save() > 0){ 
             return 1;
        }else{ 
             return 0;
        }  
    }
    //留言板
    public function actionMessage(){
        $this->layout="new";
         //判断是否存在session
        $session = \Yii::$app->session;
        if(Yii::$app->user->isGuest==1){
            $username="0";
            $ress=array();
        }else{
            $username=Yii::$app->user->identity->username;
            $id=Yii::$app->user->identity->id;
            $ress=User::find()->where('id='.$id)->asarray()->one();
        }
       
        
        return $this->render('message',[
                'ress'=>$ress,
                'username'=>$username,

            ]);
    }
    public function actionMessages(){
        $res=Yii::$app->request->get();
       
        $models=new Message();
        $models->username=Yii::$app->user->identity->username;
        $models->user_id=Yii::$app->user->identity->id;
        $models->message=$res['content'];
        $models->time=time();
        $models->save();
       
       if($models->save() > 0){ 
             return 1;
        }else{ 
             return 0;
        }  
    }
    //每日一语
    public function actionDiary(){
        //$this->layout="new";
        $datas=new Diary();
        $data=$datas->diarylist();
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '5']);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
       
        //print_r($list);
        return $this->render('diary',[
                'list'=>$model,
                'pages'=>$pages,
            ]);
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
