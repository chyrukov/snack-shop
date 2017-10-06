<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
     'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
 ]); ?>

 <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [

 ])
 ?>

     <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'seo_desc')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'seo_keyword')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
