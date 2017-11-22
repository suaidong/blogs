<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\admin\DiarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '日记';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('写日记', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'content:ntext',
             [
                'attribute' => 'content',
                'format' => 'html',
            ],
            //'time',
           [
                'attribute' => 'time',
                'format' => ['date','Y-m-d H:i:s'],
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
