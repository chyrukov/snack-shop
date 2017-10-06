<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_orders') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'bdate') ?>

    <?php // echo $form->field($model, 'vin') ?>

    <?php // echo $form->field($model, 'auto_brend') ?>

    <?php // echo $form->field($model, 'auto_model') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'date_start') ?>

    <?php // echo $form->field($model, 'date_end') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'zone') ?>

    <?php // echo $form->field($model, 'period') ?>

    <?php // echo $form->field($model, 'taxi') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'summa') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'order_type') ?>

    <?php // echo $form->field($model, 'order_company') ?>

    <?php // echo $form->field($model, 'clients_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
