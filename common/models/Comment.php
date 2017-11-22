<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\User;

class Comment extends \yii\db\ActiveRecord{

	public static function tableName(){

		return 'comment';

	}


	public function  rules(){

		 return [
            
            [['id', 'user_id', 'article_id','pid','state'], 'integer'],
            [['content','username'], 'string'],
           	// [['time'], 'string', 'max' => 20],
        ];
	}
	//获取集体评论内容
	public function lists($article_id,$num){
		$res=Comment::find()
		->select("user.img,comment.*")
		->join('LEFT JOIN','user','user.id = comment.user_id')
		->where('article_id='.$article_id." and pid=0")
		->orderBy('id DESC')
		->limit($num)
		->asarray()
		->all();
		return $res;
	}

	//获取首页三个最新的评论内容
	public function listss($num){
		$res=Comment::find()
		->select("user.img,comment.*")
		->join('LEFT JOIN','user','user.id = comment.user_id')
		//->where("comment.pid=0")
		->orderBy('id DESC')
		->limit($num)
		->asarray()
		->all();
	
		return $res;
	}

	//获取评论回复

	public function relist($id){
		$res=Comment::find()
		->select("user.img,comment.*")
		->join('LEFT JOIN','user','user.id = comment.user_id')
		->where("comment.pid=".$id)
		->orderBy('id DESC')
		->asarray()
		->all();
		return $res;
	}





}