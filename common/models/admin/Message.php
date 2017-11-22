<?php

namespace common\models\admin;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $message
 * @property string $remessage
 * @property string $time
 * @property integer $state
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'state'], 'integer'],
            [['message', 'remessage','username'], 'string'],
            // [['time'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username'=>'名称',
            'user_id' => '用户ID',
            'message' => '留言内容',
            'remessage' => '回复内容',
            'time' => '时间',
            'state' => '状态',
        ];
    }
}
