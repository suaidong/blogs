<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">              
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<link href="css/styles.css" rel="stylesheet">
<link href="css/animation.css" rel="stylesheet">
<link href="css/view.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>

<body>
<?php $this->beginBody() ?>

<header>
  <!-- <div style="height:100px;background:url(images/back1.jpg) fixed center center no-repeat;background-size:cover;"></div> -->
  <nav id="nav">
    <ul>
      <li><a href="<?= Url::to(['site/index'])?>" >网站首页</a></li>
      <li><a href="<?= Url::to(['site/study'])?>"  >学无止境</a></li>
      <li><a href="<?= Url::to(['site/diary'])?>"  >每日一语</a></li>
      <li><a href="<?= Url::to(['site/message'])?>" >留言板</a></li>
      <li><a href="<?= Url::to(['site/game'])?>"  >迷宫</a></li>
    </ul>
    <script src="js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
</header>

        <?= $content ?>
   
<footer>
  <div class="footer-mid">
    <div class="links">
      <h2>友情链接</h2>
      <ul>
        <li><a href="/">杨青个人博客</a></li>
        <li><a href="http://www.3dst.com">3DST技术服务中心</a></li>
      </ul>
    </div>
    <div class="visitors">
     
    </div>
   
  </div>
  <div class="footer-bottom">
    <p>Copyright 2013 Design by <a href="http://www.yangqq.com">DanceSmile</a></p>
  </div>
</footer>
<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> <a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<!-- 代码结束 -->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
