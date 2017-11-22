<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\admin\Diary */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '日记', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diary-view">

   
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
        
        <?php $from=ActiveForm::end(); ?>

</div>
