<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\admin\Diary */

$this->title = '更新日记: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '日记', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="diary-update">

    <h1><?= Html::encode($this->title) ?></h1>


   		
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

</div>
