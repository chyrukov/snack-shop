<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Персонал';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            [
                    'attribute' => 'photo',
                    'format' => 'html',
                    'value' => function($model) { return Html::img('/images/'.$model->photo, ['width'=>'75']); },
                    'contentOptions'=>['style'=>'width: 50px;']
            ],
            [
                'attribute' => 'status',
                'options' => ['style' => 'width: 65px; max-width: 65px;'],
                //'contentOptions'=>['style'=>'white-space: normal;'],
                'value' => function($model){
                        if ($model->status == 1) return 'Активный';
                        else return 'Заблокирован';
                },
                'contentOptions' => ['class' => 'come-class'],
                'filter' => Html::activeDropDownList(
                        $searchModel,
                        'status',
                        [0 => 'Заблокирован', 1 => 'Активный'],['class'=>'form-control','prompt' => 'Все']),
            ],
            //'text:ntext',
            'position',
            [
                'attribute'=>'order',
                'label'=>'Сортировка',
                'options' => ['style' => 'width: 65px; max-width: 65px;'],
                //'contentOptions'=>['style'=>'white-space: normal;'],
                'value' => $model->order,
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
