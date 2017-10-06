<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Best */

$this->title = 'Изменить';
$this->params['breadcrumbs'][] = ['label' => 'Лучшее предложение', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_best, 'url' => ['view', 'id' => $model->id_best]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="best-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
