<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Greencard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="greencard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList([
                    'A' => 'Легковые автомобили',
                    'E' => 'Автобусы',
                    'C' => 'Грузовые автомобили',
                    'F' => 'Прицепы, полуприцепы',
                    'B' => 'Мотоциклы',
                ]); ?>

    <?= $form->field($model, 'zone')->dropDownList([
                    'ABMR' => 'Азербайджан, Беларусь, Молдова, Россия',
                    'EUR' => 'Европа',
                ]) ?>

    <?= $form->field($model, 'period')->dropDownList([
                    0 => '15 дней',
                    1 => '1 месяц',
                    2 => '2 месяца',
                    3 => '3 месяца',
                    4 => '4 месяца',
                    5 => '5 месяцев',
                    6 => '6 месяцев',
                    7 => '7 месяцев',
                    8 => '8 месяцев',
                    9 => '9 месяцев',
                    10 => '10 месяцев',
                    11 => '11 месяцев',
                    12 => '1 год'
                ]) ?>

    <?= $form->field($model, 'summa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
