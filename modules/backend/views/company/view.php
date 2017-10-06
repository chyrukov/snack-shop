<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Страховые компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id_company], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_company], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_company',
            'name',
            [
               'attribute' => 'logo',
                'format' => 'html',
                'value' => Html::img('@web/images/'.$model->logo, ['height'=>'150']),
            ],
            'bonus',
            [
               'attribute' => 'fran',
               'value' => ($model->status == 1) ? '1000 грн.' : '0 грн.',
            ],
            [
               'attribute' => 'tech',
               'value' => ($model->status == 1) ? 'Есть' : 'Нет',
            ],
            'rate',
            [
               'attribute' => 'clients',
               'value' => ($model->status == 1) ? 'Есть' : 'Нет',
            ],
            [
               'attribute' => 'direct',
               'value' => ($model->status == 1) ? 'Есть' : 'Нет',
            ],
            [
               'attribute' => 'delivery',
               'value' => ($model->status == 1) ? 'Есть' : 'Нет',
            ],
            [
               'attribute' => 'status',
               'value' => ($model->status == 1) ? 'Активный' : 'Заблокирован',
            ],
        ],
    ]) ?>

</div>
