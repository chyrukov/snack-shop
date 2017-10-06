<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Greencard */

$this->title = 'Добавить тариф';
$this->params['breadcrumbs'][] = ['label' => 'Greencards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="greencard-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
