<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Best */

$this->title = 'Create Best';
$this->params['breadcrumbs'][] = ['label' => 'Bests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="best-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
