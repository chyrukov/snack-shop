<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uprofile */

$this->title = 'Изменить профиль: ';
?>
<div class="uprofile-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
