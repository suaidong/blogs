<?php

namespace common\models\admin;
use  yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\Connection;
use Yii;

/**
 * This is the model class for table "article".
 *
 * @property string $id
 * @property integer $type_id
 * @property string $title
 * @property string $img
 * @property string $content
 * @property string $author
 * @property string $time
 * @property integer $sort
 * @property integer $state
 */
class Article extends \yii\db\ActiveRecord
{

    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }
    /**
    *给时间设置默认值
    */
     public function behaviors()
      {
         return [
              [
                  'class' => TimestampBehavior::className(),
                  'createdAtAttribute' => 'time',// 自己根据数据库字段修改
                  'updatedAtAttribute' => 'uptime', // 自己根据数据库字段修改, //
                  'value'   => function(){return time();},
              ],
          ];
     }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id','title','content','img','author'], 'required','message'=>'不能为空'],
            [['type_id', 'sort', 'state','is_recom'], 'integer'],
            [['content'], 'string'],
            [['title', 'img'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 50],
            [['time','uptime'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'id' => 'ID',
            'type_id' => '文章类型',
            'title' => '标题',
            'img' => '封面图片',
            'content' => '文章内容',
            'author' => '作者',
            'time' => '时间',
            'uptime'=>'更新时间',
            'sort' => 'Sort',
            'is_recom' => '是否推荐',
            'state' => 'State',
        ];
    }

   //获取分类名称
    public function getType(){

        $cat['one']='请选择';
        $db = Yii::$app->db;
        $command = $db->createCommand("SELECT * FROM `article_type` ORDER BY id DESC");
        $arr = $command->queryAll();
        if($arr){
            foreach($arr as $key=>$val){
                $cat[$key+1]=$val['name'];
            }
       }
     return $cat;

    }
   //获取文章详情
    public function detial($id){
        $resu=Article::find()->where('id='.$id)->asarray()->all();
        if(is_array($resu)){
            foreach ($resu as $key => $value) {
                $resu[$key]['time']=date('Y-m-d H:i:s',$value['time']);
            }
        }
        return $resu;
    }

  //获取文章列表
   public function lists($order,$type_id=0){
    if ($order=="id") {
      $orders="article.id DESC";
    }else{
      $orders="article.view DESC";
    }
    if($type_id==0){
      $type=" ";
    }else{
      $type="and type_id=".$type_id;
    }

      $res=Article::find()->select("article_type.name,article.*")->join('LEFT JOIN','article_type','article.type_id = article_type.id')->where("article.state=0 ".$type)->orderBy($orders);

      return $res;
   }


   //获取文章推荐列表
   public function reclist(){
   
      $res=Article::find()->select("article_type.name,article.*")->join('LEFT JOIN','article_type','article.type_id = article_type.id')->where("article.state=0 and article.is_recom=1")->orderBy("uptime DESC")->asarray()->all();
      if(is_array($res)){
        foreach ($res as $key => $value) {
              $res[$key]['content']=mb_substr(strip_tags($value['content']),'0','120','utf-8')."......";
        }
      }

      return $res;
   }


   //浏览量
   public function views($id){
      $model = Article::findOne($id);
      $model->view+=1;
      $model->save();

   }

}
