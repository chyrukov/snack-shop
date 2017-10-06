<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */

$this->title = 'Изменить: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pages-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
