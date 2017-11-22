<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\admin\Article */

$this->title = 'Update Article: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '文章修改';
?>
<div class="article-update">

   		<!-- <h1><?= Html::encode($this->title) ?></h1> -->
		<p>
     	 <a href="<?=Url::to(['article/index'])?>">返回</a>
       
    	</p>
   		<?php $from=ActiveForm::begin()?>
	
   		
		
		
		<?=$from->field($model,'type_id')->DropDownList($type)?>

   		<?=$from->field($model,'title')->textinput()?>
		<?=$from->field($model,'author')->textinput()?>
		<?php $form = ActiveForm::begin(); ?>
		
   		<?= $form->field($model, 'img')->widget('common\widgets\file_upload\FileUpload',[
        'config'=>[
            //图片上传的一些配置，不写调用默认配置
            'domain_url' => '../../../',
        ]
    	]) ?>
		
		<?= $form->field($model, 'content')->widget('common\widgets\ueditor\Ueditor',[
		    'options'=>[
		        'initialFrameWidth' => 850,
		        'initialFrameHeight' => 450,
		    ]
		]) ?>
		<?=$form->field($model, 'is_recom')->radioList(['1'=>'是','0'=>'否']) ?>
		<div class="form-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
 		
		<?php $from=ActiveForm::end(); ?>

	
  		<?php $from=ActiveForm::end() ?>



</div>
