<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\admin\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '留言管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'message:ntext',
             [
                'attribute' => 'message',
                'format' => 'html',
             ],
            //'remessage:ntext',
            [
                'attribute'=>'time',
                'format'=>['date','Y-m-d H:i:s']

            ],
            //'time',
            //'state',
             [
                'attribute'=>'state',
                'value'=>function($data){
                    return $data->state == 1 ? '已回复' : '未回复';
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
