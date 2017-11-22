<?php

namespace common\models\admin;

use Yii;
use  yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "diary".
 *
 * @property string $id
 * @property string $content
 * @property string $time
 */
class Diary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diary';
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
            [['content','img','time'], 'string'],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '日记内容',
            'img'   =>'图片',
            'time' => '时间',
        ];
    }

    //日记列表
    public function diarylist(){
        $data=Diary::find();
       
        return $data;
    }
}
