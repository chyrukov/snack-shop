<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказ страхования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
                if($model->status == 0){
                    return ['class' => 'warning'];
                }
                if($model->status == 2){
                    return ['class' => 'success'];
                }
                if($model->status == 1){
                    return ['class' => 'info'];
                }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_orders',
            'fio',
            //'address',
            //'email:email',
            //'inn',
            // 'bdate',
            // 'vin',
            // 'auto_brend',
            // 'auto_model',
            // 'number',
            // 'date_start',
            // 'date_end',
            // 'type',
            // 'zone',
            // 'period',
            // 'taxi',
            [
              'attribute' => 'date',
              'value' => function ($model) {
                        //return Yii::$app->formatter->asDate($model->date);
                        return date('Y-m-d G:i:s', $model->date);
              },
              'filter' => DatePicker::widget([
                  'model'      => $searchModel,
                  'attribute'  => 'date',
                  'dateFormat' => 'php:Y-m-d',
                  'options' => [
                      'class' => 'form-control',
                  ],
              ]),
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                        if ($model->status == 1) return 'Обработан';
                        if ($model->status == 2) return 'Оформлен';
                        else return 'Ожидание';
                },
                'contentOptions' => ['class' => 'come-class'],
                'filter' => Html::activeDropDownList(
                        $searchModel,
                        'status',
                        [0 => 'Ожидание', 1 => 'Обработан', 2 => 'Оформлен'],['class'=>'form-control','prompt' => 'Все']),
            ],
            // 'summa',
            // 'comments',
            [
                'attribute' => 'order_type',
                'value' => function($model){
                        if ($model->order_type == 1) return 'Заполнение формы - Зеленая карта';
                        if ($model->order_type == 2) return 'Телефон - ОСАГО';
                        if ($model->order_type == 3) return 'Заполнение формы - ОСАГО';
                        else return 'Телефон - Зеленая карта';
                },
                'contentOptions' => ['class' => 'come-class'],
                'filter' => Html::activeDropDownList(
                        $searchModel,
                        'order_type',
                        [0 => 'Телефон - Зеленая карта', 1 => 'Заполнение формы - Зеленая карта', 2 => 'Телефон - ОСАГО', 3 => 'Заполнение формы - ОСАГО'],
                        ['class'=>'form-control','prompt' => 'Все']),
            ],
            // 'order_company',
            [
                    'attribute' => 'clients_id',
                    'label' => 'Телефон заказчика',
                    'value' => 'clients.phone',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
