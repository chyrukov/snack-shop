<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = 'Заявка номер - '.$model->id_orders;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <p>
        <?= Html::a('Изменить данные', ['update', 'id' => $model->id_orders], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_orders], [
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
            //'id_orders',
            'fio',
            'address',
            'email:email',
            'inn',
            'bdate',
            'vin',
            [
               'attribute' => 'auto_brend',
                'format' => 'html',
                'value' => app\models\AutoBrend::getBrend($model->auto_brend),
            ],
            [
               'attribute' => 'auto_model',
                'format' => 'html',
                'value' => app\models\AutoModel::getModel($model->auto_model),
            ],
            'number',
            'date_start',
            'date_end',
            'type',
            'zone',
            'period',
            'taxi',
            [
                'attribute' => 'date',
                'value' => Yii::$app->formatter->asDate($model->date),
            ],
            [
               'attribute' => 'status',
               'value' => \app\models\Orders::getStatus($model->status),
            ],
            'summa',
            'comments',
            [
               'attribute' => 'order_type',
               'value' => \app\models\Orders::getTypeOrders($model->order_type),
            ],
            [
               'attribute' => 'order_company',
               'value' => \app\models\Company::getCompany($model->order_company),
            ],
            'clients.phone',
            'clients.name',
        ],
    ]) ?>

</div>
