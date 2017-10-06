<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Personal */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
