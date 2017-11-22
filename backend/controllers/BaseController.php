<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;

class BaseController extends Controller{

	public function beforeAction($action){
		if (Yii::$app->user->isGuest) {
	        // 没有登录,登录,登录后,返回
	        Yii::$app->user->setReturnUrl(Yii::$app->request->getUrl());  // 设置返回的url,登录后原路返回
	        Yii::$app->user->loginRequired();
	        Yii::$app->end();
        }
		if(!parent::beforeAction($action)){
			return false;
		}
		return true;
	}
	
}
