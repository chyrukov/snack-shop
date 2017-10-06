<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Phone */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Phones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'phone',
            [
               'attribute' => 'status',
               'value' => \app\models\Phone::getStatus($model->status),
            ],
            [
                'attribute' => 'date',
                'value' => Yii::$app->formatter->asDate($model->date),
            ],
            [
                'attribute' => 'date_reply',
                'value' => Yii::$app->formatter->asDate($model->date_reply),
            ],
            'comments',
        ],
    ]) ?>

</div>