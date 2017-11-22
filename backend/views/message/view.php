<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\admin\Message */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '留言', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('回复', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            //'message:ntext',
            [
                'attribute'=>'message',
                 'format'=>'html'
            ],
            'remessage:ntext',
            [
                'attribute'=>'time',
                'format'=>['date','Y-m-d H:i:s']

            ],
            'state',
        ],
    ]) ?>

</div>
