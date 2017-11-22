<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\admin\Article */

$this->title = '写文章';
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

   		<h1><?= Html::encode($this->title) ?></h1>
	
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
		
		<div class="form-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
 		
		<?php $from=ActiveForm::end(); ?>

	
  		<?php $from=ActiveForm::end() ?>

</div>
