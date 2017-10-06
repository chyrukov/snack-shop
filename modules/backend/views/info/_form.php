<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\switchinput\SwitchInput;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Politic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="politic-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'pluginOptions' => [
            'initialPreview'=>[
                $model->image ? Html::img("@web/images/" . $model->image):null,
            ],
            'initialCaption'=>$model->image,
            'overwriteInitial'=>true,
            'showUpload' => false
        ]
        ]);
    ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
            'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
        ]);
    ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'name'=>'status',
              'pluginOptions'=>[
              'handleWidth'=>60,
              'onText'=>'На сайт',
              'offText'=>'Скрыть'
              ]
          ])
    ?>

    <p>
        <a class="dashed-link collapsed" data-toggle="collapse" href="#seo-form" aria-expanded="false" aria-controls="seo-form">Seo тексты</a>
    </p>

    <div class="collapse" id="seo-form">

          <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'seo_desc')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'seo_keyword')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
