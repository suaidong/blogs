<!--header end-->
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager; 

?>
<style>
  form {
    margin: 0;
  }
  h3{
    text-align:center;
  }
  textarea {
    display: block;
  }
  form .ke-container {
    margin: 0 auto;
  }
</style>
<link href="themes/default/default.css" rel="stylesheet" />
<script src="js/kindeditor-min.js"></script>
<script src="js/emoticons.js"></script>
<script src="js/zh_CN.js"></script>
<script>
    var editor;
    KindEditor.ready(function(K) {
      editor = K.create('textarea[name="content"]', {
        resizeType : 1,
        allowPreviewEmoticons : false,
        allowImageUpload : false,
        items : ['emoticons', 'image']
        // 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
        //   'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
        //   'insertunorderedlist', '|',
      });
    });
    var editors;
    KindEditor.ready(function(K) {
      editors = K.create('textarea[name="contents"]', {
        resizeType : 1,
        allowPreviewEmoticons : false,
        allowImageUpload : false,
        items : ['emoticons', 'image']
        // 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
        //   'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
        //   'insertunorderedlist', '|',
      });
    });
</script>
<div id="mainbody">
  <div class="blogs">
    <div id="index_view">
      <h2 class="t_nav"><a href="/">网站首页</a><a href="/">慢生活</a></h2>
      <h1 class="c_titile"><?= $list['0']['title']?></h1>
      <p class="box">发布时间：<?= $list['0']['time']?><span>编辑：<?= $list['0']['author']?></span>阅读（<?= $list['0']['view']?>）</p>
      <ul>
        <?= $list['0']['content']?>
      </ul>
      <input type="hidden" id="artic_id" value="<?= $list['0']['id']?>">
      <div class="share"> 
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <span class="bds_more">分享到：</span> <a class="bds_qzone"></a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <a class="bds_t163"></a> <a class="shareCount"></a> </div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
        <script type="text/javascript" id="bdshell_js"></script> 
        <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
        <!-- Baidu Button END --> 
      </div>
      <!-- 富文本编译器 -->
      <div>
        <?php if($username){?>
          <div style="width:42px;height:42px;background:url('<?= yii::$app->params['avatar'].''.$ress['img']?>') no-repeat center center;background-size:100% 100%;"></div>
                  
        <?php }else{?>

          <div style="width:42px;height:42px;background:url('images/pic42_null.gif')"></div>
        <?php }?>
        <form id="comment">
          <textarea id="texts" name="content" style="width:100px;height:200px;visibility:hidden;"></textarea>
          <input id="username" type="hidden" value="<?= $username ?>">
        </form>
        <button id="btn" style="float:right">发表评论</button>
       <!--  <div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
        </div> -->   
      </div>
      <!-- 富文本编译器 -->
     

    <div class="comm">
      <h2>最新评论</h2>
      <?php foreach ($li as $key => $value) {?>
      <div class="container"> 
        
        <div class="right">

        <img style="width:42px;height:42px" src="<?= yii::$app->params['avatar'].''.$value['img']?>">
        <p>[<?= $value['username']?>]评论于<?= date('Y-m-d h:i:s',$value['time'])?></b></p>
        
        </div>
        <div class="left"><?= $value['content']?>
        </div>
        <?php if(!empty($value['re'])){foreach ($value['re'] as $keys => $values) {?>
            <div class="rep" >

              <div class="right">
              <img style="width:42px;height:42px" src="<?= yii::$app->params['avatar'].''.$values['img']?>">
              <p>[<?= $values['username']?>]回复于<?= date('y-m-d h:i:s',$values['time'])?></p>
              
              </div>
              <div style="margin-right:-50px" class="left"><?= $values['content']?>
              </div>
             
            </div> 
        <?php } }?>

        <!-- <div style="clear:both; height:0;width:0"></div> -->
        <a class="re" onclick="div_click(this)">回复</a>
        
        <div class="retext" style="margin-left:-60px;display:none;">
            <form id="recomment">
              <textarea id="textss" name="contents" style="width:100px;height:200px;visibility:hidden;"></textarea>
            </form>
            <button id="bbtn" onclick="retext(<?= $value['id']?>,this)" style="float:right">发表评论</button>
        </div>
        <div style="height:0;width:0;clear:both;"></div>

      </div>
      <?php }?>

   

    </div>
</div>
    <!--bloglist end-->
    <aside>
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div>
      <div class="sunnav">
        <ul>
          <li><a href="/web/" target="_blank" title="网站建设">网站建设</a></li>
          <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">HTML5 / CSS3</a></li>
          <li><a href="/jstt/" target="_blank" title="技术探讨">技术探讨</a></li>
          <li><a href="/news/s/" target="_blank" title="慢生活">慢生活</a></li>
        </ul>
      </div>
      <div class="tuijian">
        <h2>栏目更新</h2>
        <ol>
          <li><span><strong>1</strong></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
          <li><span><strong>2</strong></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
          <li><span><strong>3</strong></span><a href="/">女孩都有浪漫的小情怀——浪漫的求婚词</a></li>
          <li><span><strong>4</strong></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
          <li><span><strong>5</strong></span><a href="/">女生清新个人博客网站模板</a></li>
          <li><span><strong>6</strong></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
          <li><span><strong>7</strong></span><a href="/">Column 三栏布局 个人网站模板</a></li>
          <li><span><strong>8</strong></span><a href="/">时间煮雨-个人网站模板</a></li>
          <li><span><strong>9</strong></span><a href="/">花气袭人是酒香—个人网站模板</a></li>
        </ol>
      </div>
      <div class="toppic">
        <h2>图文并茂</h2>
        <ul>
          <li><a href="/"><img src="images/k01.jpg">腐女不可怕，就怕腐女会画画！
            <p>伤不起</p>
            </a></li>
          <li><a href="/"><img src="images/k02.jpg">问前任，你还爱我吗？无限戳中泪点~
            <p>感兴趣</p>
            </a></li>
          <li><a href="/"><img src="images/k03.jpg">世上所谓幸福，就是一个笨蛋遇到一个傻瓜。
            <p>喜欢</p>
            </a></li>
        </ul>
      </div>
      <div class="clicks">
        <h2>热门点击</h2>
        <ol>
          <li><span><a href="/">慢生活</a></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
          <li><span><a href="/">爱情美文</a></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
          <li><span><a href="/">慢生活</a></span><a href="/">女孩都有浪漫的小情怀——浪漫的求婚词</a></li>
          <li><span><a href="/">博客模板</a></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
          <li><span><a href="/">女生个人博客</a></span><a href="/">女生清新个人博客网站模板</a></li>
          <li><span><a href="/">Wedding</a></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
          <li><span><a href="/">三栏布局</a></span><a href="/">Column 三栏布局 个人网站模板</a></li>
          <li><span><a href="/">个人网站模板</a></span><a href="/">时间煮雨-个人网站模板</a></li>
          <li><span><a href="/">古典风格</a></span><a href="/">花气袭人是酒香—个人网站模板</a></li>
        </ol>
      </div>
    </aside>
  </div>
  <!--blogs end--> 
</div>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="layer/layer.js"></script>
<script type="text/javascript">
  $("#btn").click(function(){
        var a=$("#username").val();
        var artic_id=$("#artic_id").val();
        editor.sync();  
        var b=$("textarea[name='content']").val();
       if(a==0){
          //layer.alert('请先登录', {icon: 2});
          location.href="http://localhost/blogs/frontend/web/index.php?r=site%2Flogin";
       }else{
            if (b=='') {
                  layer.alert('评论内容不能为空',{icon:2});
                  return false;
              };
          $.get("<?=  Url::to(['site/comment'])?>",{content:b,artic_id:artic_id},function(json){
                      //var json=JSON.parse(json);
                     
                      if(json=='1'){
                          layer.alert('评论成功',{icon:1},function(){
                               window.location.reload(); 
                          }); 
                      }
                      if(json=='0'){
                          layer.alert('评论失败',{icon:2});
                      }
                     
          })
       }

  })

   function div_click(obj){
          var b = $(obj).next(".retext").css('display');
          if(b == 'none'){
              $(obj).next(".retext").show();
          }else{
              $(obj).next(".retext").hide();
          }
        }

   function retext(reid,obj){
        var a=$("#username").val();
         if(a==0){
          //layer.alert('请先登录', {icon: 2});
          location.href="http://localhost/blogs/frontend/web/index.php?r=site%2Flogin";
        }else{
            if (b=='') {
                  layer.alert('评论内容不能为空',{icon:2});
                  return false;
              };
        }
        var artic_id=$("#artic_id").val();
        editors.sync();  
        var b=$("textarea[name='contents']").val();
       
        
        //alert(b);
       
          //获取评论的父级ID
        $.get("<?=  Url::to(['site/comments'])?>",{pid:reid,content:b,artic_id:artic_id},function(json){
                      //var json=JSON.parse(json);
                     
                      if(json=='1'){
                          layer.alert('评论成功',{icon:1},function(){
                               window.location.reload(); 
                          }); 
                      }
                      if(json=='0'){
                          layer.alert('评论失败',{icon:2});
                      }
                     
          })
   }

</script>