<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Category;
//use dvizh\gallery\widgets\Gallery;
use kartik\select2\Select2;
//use dvizh\seo\widgets\SeoForm;

?>

<div class="category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    
    <?= $form->field($model, 'slug')->textInput(['placeholder' => 'Не обязательно']) ?>
	
	<?= $form->field($model, 'sort')->textInput() ?>
	
    <?php echo $form->field($model, 'text')->textarea() ?>
    
    <?= $form->field($model, 'parent_id')
            ->widget(Select2::classname(), [
                'data' => Category::buildTextTree(null, 1, [$model->id]),
                'language' => 'ru',
                'options' => ['placeholder' => 'Выберите категорию ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
