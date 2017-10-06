<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
         'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
     ]);
    ?>

    <?= $form->field($model, 'bonus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fran')->widget(SwitchInput::classname(), [
        'name'=>'status',
              'pluginOptions'=>[
              'handleWidth'=>60,
              'onText'=>'1000 грн',
              'offText'=>'0 грн'
              ]
          ])
    ?>

    <?= $form->field($model, 'logo')->widget(FileInput::classname(), [
        'pluginOptions' => [
            'initialPreview'=>[
                $model->logo ? Html::img("@web/images/" . $model->logo):null,
            ],
            'initialCaption'=>$model->logo,
            'overwriteInitial'=>true,
            'showUpload' => false
        ]
        ]);
    ?>

    <?= $form->field($model, 'tech')->widget(SwitchInput::classname(), [
        'name'=>'status',
              'pluginOptions'=>[
              'handleWidth'=>60,
              'onText'=>'Есть',
              'offText'=>'Нет'
              ]
          ])
    ?>

    <?= $form->field($model, 'rate')->dropDownList(
        [
          0 => 'Ужасный',
          1 => 'Низкий',
          2 => 'Средний',
          3 => 'Хороший',
          4 => 'Высокий',
        ]
      )
    ?>

    <?= $form->field($model, 'clients')->widget(SwitchInput::classname(), [
        'name'=>'status',
              'pluginOptions'=>[
              'handleWidth'=>60,
              'onText'=>'Есть',
              'offText'=>'Нет'
              ]
          ])
    ?>

    <?= $form->field($model, 'direct')->widget(SwitchInput::classname(), [
        'name'=>'status',
              'pluginOptions'=>[
              'handleWidth'=>60,
              'onText'=>'Есть',
              'offText'=>'Нет'
              ]
          ])
    ?>

    <?= $form->field($model, 'delivery')->widget(SwitchInput::classname(), [
        'name'=>'status',
              'pluginOptions'=>[
              'handleWidth'=>60,
              'onText'=>'Есть',
              'offText'=>'Нет'
              ]
          ])
    ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'name'=>'status',
              'pluginOptions'=>[
              'handleWidth'=>60,
              'onText'=>'Активна',
              'offText'=>'Отключена'
              ]
          ])
    ?>
    
    <?= $form->field($model, 'type')->dropDownList(
        [
          0 => 'ОСАГО',
          1 => 'Зеленая карта',
          2 => 'Все',
        ]
      )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
