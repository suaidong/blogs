<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\admin\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('发布文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            //'type_id',
            'title',
           [
            'attribute'=>'img',      
            'format' => ['image',['width'=>'30','height'=>'30',]],
            ],
            //'content:ntext',
            'author',
            //'time',
            //'sort',
            //'state',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
