<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\PhoneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-index">

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

            'name',
            [
                'label' => 'Номер телефона',
                'attribute' => 'phone',
                'contentOptions'=>['style'=>'max-width: 20px;']
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
              'attribute' => 'date_reply',
              'value' => function ($model) {
                        //return Yii::$app->formatter->asDate($model->date);
                        if ($model->date_reply === null)
                            return " - ";
                        return date('Y-m-d G:i:s', $model->date_reply);
              },
              'filter' => DatePicker::widget([
                  'model'      => $searchModel,
                  'attribute'  => 'date_reply',
                  'dateFormat' => 'php:Y-m-d',
                  'options' => [
                      'class' => 'form-control',
                  ],
              ]),
            ],
            //'comments',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}'
            ],
        ],
    ]); ?>
</div>