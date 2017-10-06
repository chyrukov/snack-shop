<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Company;
use app\models\AutoBrend;
use app\models\AutoModel;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vin')->textInput(['maxlength' => true]) ?>

    <?php if ($model->order_type == 1 || $model->order_type == 3): ?>
        <?= $form->field($model, 'auto_brend')->dropDownList(
            ArrayHelper::map(AutoBrend::find()->all(),'id_auto_brend','title'),
            [
                'disabled'=>'disabled'
            ]
        ) ?>

        <?= $form->field($model, 'auto_model')->dropDownList(
            ArrayHelper::map(AutoModel::find()->all(),'id_auto_model','model_title'),
            [
                'disabled'=>'disabled'
            ]
        ) ?>

    <?php else :?>

    <?= $form->field($model, 'auto_brend')->dropDownList(
      ArrayHelper::map(AutoBrend::find()->orderBy('title')->all(),'id_auto_brend','title'),
      [
          'prompt' => 'Выбор',
          'onchange' => '
                          $.post("/auto-model/lists?id='.'"+$(this).val(),function(data){
                          $("select#orders-auto_model").html(data);
                  });
              ',
      ]
  ) ?>

  <?= $form->field($model, 'auto_model')->dropDownList(
        //ArrayHelper::map(AutoModel::find()->all(),'id_auto_model','model_title'),
        [
            'prompt' => 'Вибор модели',
        ]
    ) ?>

<?php endif?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_start')->textInput() ?>

    <?= $form->field($model, 'date_end')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'period')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxi')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
                        1 => 'Обработан',
                        2 => 'Оформлен',
                    ])
    ?>

    <?= $form->field($model, 'summa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_type')->dropDownList([
                  0 => 'Телефон - Зеленая карта',
                  1 => 'Заполнение формы - Зеленая карта',
                  2 => 'Телефон - ОСАГО',
                  3 => 'Заполнение формы - ОСАГО',
        ],['disabled'=>'disabled'])
    ?>

    <?= $form->field($model, 'order_company')->dropDownList(
        ArrayHelper::map(Company::find()->all(),'id_company','name'),
        [
            'disabled'=>'disabled'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
