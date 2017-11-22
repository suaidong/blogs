<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\admin\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">
    <p>
      <a href="<?=Url::to(['article/index'])?>">返回</a>
       
    </p>
    <center>
    
        <th ><h3><?=$data['0']['title']?></h3></th>
        <br/><br/>
        <tr>
            <td>时间：<?=$data['0']['time']?></td>&nbsp;&nbsp;
            <td>编辑：<?=$data['0']['author']?></td>

        </tr>
        <hr style="height:5px;border:none;border-top:5px ridge green;">
        <tr><?=$data['0']['content']?></tr>
    </center>

</div>
