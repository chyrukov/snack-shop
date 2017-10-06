<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GreencardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Зеленая карта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="greencard-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'type',
                'value' => function($model){
                        if ($model->type == 'A') return 'Легковые автомобили';
                        else if ($model->type == 'E') return 'Автобусы';
                        else if ($model->type == 'C') return 'Грузовые автомобили';
                        else if ($model->type == 'F') return 'Прицепы, полуприцепы';
                        else if ($model->type == 'B') return 'Мотоциклы';
                        else return 'Не установлено';
                },
                'contentOptions' => ['class' => 'come-class'],
                'filter' => Html::activeDropDownList(
                        $searchModel, 
                        'type', 
                        [
                            'A' => 'Легковые автомобили', 
                            'E' => 'Автобусы', 
                            'C' => 'Грузовые автомобили', 
                            'F' => 'Прицепы, полуприцепы', 
                            'B' => 'Мотоциклы'
                        ],
                        ['class'=>'form-control','prompt' => 'Все']),
            ],
            [
                'attribute' => 'zone',
                'value' => function($model){
                        if ($model->zone == 'EUR') return 'Европа';
                        else return 'Азербайджан, Беларусь, Молдова, Россия';
                },
                'contentOptions' => ['class' => 'come-class'],
                'filter' => Html::activeDropDownList(
                        $searchModel, 
                        'zone', 
                        [
                            'EUR' => 'Европа', 
                            'ABMR' => 'Азербайджан, Беларусь, Молдова, Россия'
                        ],
                        ['class'=>'form-control','prompt' => 'Все']),
            ],
            [
                'attribute' => 'period',
                'value' => function($model){
                    switch ($model->period){
                        case 0:
                            return "15 дней";
                        case 1:
                            return "1 месяц";
                        case 2:
                            return "2 месяца";
                        case 3:
                            return "3 месяца";
                        case 4:
                            return "4 месяца";
                        case 5:
                            return "5 месяцев";
                        case 6:
                            return "6 месяцев";
                        case 7:
                            return "7 месяцев";
                        case 8:
                            return "8 месяцев";
                        case 9:
                            return "9 месяцев";
                        case 10:
                            return "10 месяцев";
                        case 11:
                            return "11 месяцев";
                        case 12:
                            return "12 месяцев";
                    }
                },
                'contentOptions' => ['class' => 'come-class'],
                'filter' => Html::activeDropDownList(
                        $searchModel, 
                        'period', 
                        [
                            0 => '15 дней',
                            1 => '1 месяц',
                            2 => '2 месяца',
                            3 => '3 месяца',
                            4 => '4 месяца',
                            5 => '5 месяцев',
                            6 => '6 месяцев',
                            7 => '7 месяцев',
                            8 => '8 месяцев',
                            9 => '9 месяцев',
                            10 => '10 месяцев',
                            11 => '11 месяцев',
                            12 => '1 год'
                        ],
                        ['class'=>'form-control','prompt' => 'Все']),
            ],
            'summa',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
</div>
