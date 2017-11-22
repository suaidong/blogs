<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<link href="css/base.css" rel="stylesheet">
<link href="css/mood.css" rel="stylesheet">
<div class="moodlist">
  <h1 class="t_nav"><span>删删写写，回回忆忆，虽无法行云流水，却也可碎言碎语。</span><a href="<?= Url::to(['site/index'])?>" class="n1">网站首页</a><!-- <a href="/" class="n2">碎言碎语</a> --></h1>
  <div class="bloglists">
    <?php foreach ($list as $key => $value) {?>
    <ul class="arrow_box">
     <div class="sy">
     <img src="<?= yii::$app->params['img'].$value['img']?>">
      <p> <?= $value['content']?></p>
      </div>
      <span class="dateview"><?= date('Y-m-d',$value['time'])?></span>
    </ul>
    <?php }?>
      <?= LinkPager::widget(['pagination' => $pages]); ?>
  </div>
  <!-- <div class="page"><a title="Total record"><b>41</b></a><b>1</b><a href="/news/s/index_2.html">2</a><a href="/news/s/index_2.html">&gt;</a><a href="/news/s/index_2.html">&gt;&gt;</a></div> -->
</div>
<script src="js/silder.js"></script>