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
      });
    });
</script>
<div id="mainbody">
  <div class="blogs">
    <div id="index_view">
     
      
      <!-- 富文本编译器 -->
      <?php if($username){?>
          <div style="width:42px;height:42px;background:url('<?= yii::$app->params['avatar'].''.$ress['img']?>') no-repeat center center;background-size:100% 100%;"></div>
                  
        <?php }else{?>

          <div style="width:42px;height:42px;background:url('images/pic42_null.gif')"></div>
        <?php }?>
      <div>
         <input id="username" type="hidden" value="<?= $username ?>">
        <form id="comment">
          <textarea id="texts" name="content" style="width:100px;height:300px;visibility:hidden;"></textarea>
        
        </form>
        <button id="btn" style="float:right">发表评论</button>
      </div>
      <!-- 富文本编译器 -->
     
      <div style="height:200px"></div>
  
  </div>
  <!--blogs end--> 
  </div>
</div>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="layer/layer.js"></script>
<script type="text/javascript">
  $("#btn").click(function(){
        var a=$("#username").val();
        editor.sync();  
        var b=$("textarea[name='content']").val();
       if(a==0){
          location.href="<?=  Url::to(['site/login'])?>";
       }else{
            if (b=='') {
                  layer.alert('评论内容不能为空',{icon:2});
                  return false;
              };
          $.get("<?=  Url::to(['site/messages'])?>",{content:b},function(json){
                              //console.log(json);
                      if(json=='1'){
                          layer.alert('评论成功',{icon:1},function(){
                               location.href="<?=  Url::to(['site/index'])?>"; 
                          });
                      }         
                      if(json=='0'){
                          layer.alert('评论失败',{icon:2});
                      }
                     
          })
       }

  })

</script>