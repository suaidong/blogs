<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager; 
?>
<div id="mainbody">
  <div class="info">
    <figure> <img src="images/xue.gif"  alt="Panama Hat">
      <figcaption><strong>渡人如渡己，渡已，亦是渡</strong> 当我们被误解时，会花很多时间去辩白。 但没有用，没人愿意听，大家习惯按自己的所闻、理解做出判别，每个人其实都很固执。与其努力且痛苦的试图扭转别人的评判，不如默默承受，给大家多一点时间和空间去了解。而我们省下辩解的功夫，去实现自身更久远的人生价值。其实，渡人如渡己，渡已，亦是渡人。</figcaption>
    </figure>
    <div class="card">
      <h1>我的名片</h1>
      <p>网名：hahahhah | 即步非烟</p>
      <p>职业：Web前端设计师、网页设计</p>
      <p>电话：13662012345</p>
      <p>Email：dancesmiling@qq.com</p>
      <ul class="linkmore">
        <li><a href="<?= Url::to(['site/message'])?>" class="talk" title="给我留言"></a></li>
        <li><a href="/" class="address" title="联系地址"></a></li>
        <li><a href="/" class="email" title="给我写信"></a></li>
        <li><a href="/" class="photos" title="生活照片"></a></li>
        <li><a href="/" class="heart" title="关注我"></a></li>
      </ul>
    </div>
  </div>
  <!--info end-->
  <div class="blank"></div>
  <div class="blogs">
    <ul class="bloglist">
      <?php foreach($list as $key => $value){?>
      <li>
        <div class="arrow_box">
          <div class="ti"></div>
          <!--三角形-->
          <div class="ci"></div>
          <!--圆形-->
          <h2 class="title"><a href="<?=Url::to(['site/detial','id'=>$value['id']])?>" target="_blank"><?= $value['title']?></a></h2>
          <ul class="textinfo">
            <a href="/" ><img width="105" height="107.77" src="<?= yii::$app->params['img'].$value['img']?>"></a>
            <p> <?= $value['content']?></p>
          </ul>
          <ul class="details">
            <li class="likes"><a href="#">浏览量<?= $value['view']?></a></li>
            <!-- <li class="comments"><a href="#">34</a></li> -->
            <li class="icon-time"><a href="#"><?= date('Y-m-d',$value['time'])?></a></li>
          </ul>

        </div>
        <!--arrow_box end--> 
      </li>
     <?php }?>
    <?= LinkPager::widget(['pagination' => $pages]); ?>
    </ul>

    <!--bloglist end-->
    <aside>
      <div class="viny">
        <dl>
          <dt class="art"><img src="images/artwork.png" alt="专辑"></dt>
          <dd class="icon-song"><span></span>南方姑娘</dd>
          <dd class="icon-artist"><span></span>歌手：赵雷</dd>
          <dd class="icon-album"><span></span>所属专辑：《赵小雷》</dd>
          <dd class="icon-like"><span></span><a href="/">喜欢</a></dd>
          <dd class="music">
            <audio src="images/nf.mp3" controls></audio>
          </dd>
          <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
        </dl>
      </div>
      <div class="tuijian">
        <h2>推荐文章</h2>
        <ol>
          <?php foreach ($recom as $key => $value) {?>
          <li><span><strong><?= $key+1?></strong></span><a href="<?=Url::to(['site/detial','id'=>$value['id']])?>"><?= $value['title']?></a></li>
          <?php }?>
        </ol>
      </div>
      <div class="visitors">
        <h2>最新评论</h2>
      <?php foreach ($li as $key => $value) { ?>
      <dl>
        <dt><img src="<?= yii::$app->params['avatar'].''.$value['img']?>">
        <dt>
        <dd><?= $value['username']?>
          <time><?= date('Y-m-d',$value['time'])?></time>
        </dd>
        <!-- <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-07-28/530.html" class="title">如果要学习web前端开发，需要学习什么？ </a>中评论：</dd> -->
        <dd><?= $value['content']?></dd>
      </dl>
      <?php }?>

      </div>
      <div class="clicks">
        <h2>热门点击</h2>
        <ol>
          <?php foreach ($order as $key => $value){ ?>
          <li><span><a href="<?=Url::to(['site/detial','id'=>$value['id']])?>"><?= $value['name']?></a></span><a href="<?=Url::to(['site/detial','id'=>$value['id']])?>"><?= $value['title']?></a></li>
          <?php } ?>
        </ol>
      </div>
    <!--   <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div> -->
      
      <div>
        <section class="flickr">
          <h2>相册展示</h2>
          <ul>
            <li><a href="#"><img src="images/01.jpg"></a></li>
            <li><a href="#"><img src="images/02.jpg"></a></li>
            <li><a href="#"><img src="images/03.jpg"></a></li>
            <li><a href="#"><img src="images/04.jpg"></a></li>
            <li><a href="#"><img src="images/05.jpg"></a></li>
            <li><a href="#"><img src="images/06.jpg"></a></li>
            <li><a href="#"><img src="images/07.jpg"></a></li>
            <li><a href="#"><img src="images/08.jpg"></a></li>
            <li><a href="#"><img src="images/09.jpg"></a></li>
          </ul>
        </section>

      </div>
    </aside>
  </div>
  <!--blogs end--> 
</div>
<!--mainbody end-->