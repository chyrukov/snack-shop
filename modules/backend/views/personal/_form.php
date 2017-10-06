<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\switchinput\SwitchInput;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->widget(FileInput::classname(), [
        'pluginOptions' => [
            'initialPreview'=>[
                $model->photo ? Html::img("@web/images/" . $model->photo):null,
            ],
            'initialCaption'=>$model->photo,
            'overwriteInitial'=>true,
            'showUpload' => false
        ]
        ]);
    ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
            'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
        ]);
    ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>
    
    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), ['name'=>'status',
              'pluginOptions'=>[
              'handleWidth'=>60,
              'onText'=>'Есть',
              'offText'=>'Нет'
              ]
          ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
