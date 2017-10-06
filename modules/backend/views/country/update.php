<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = 'Изменить: ' . $model->country;
$this->params['breadcrumbs'][] = ['label' => 'Территории покрытия', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country, 'url' => ['view', 'id' => $model->id_country]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="country-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
