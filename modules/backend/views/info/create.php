<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Politic */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Politic', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="politic-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
