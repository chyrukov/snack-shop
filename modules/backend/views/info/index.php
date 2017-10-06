<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PoliticSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="politic-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
                if($model->status == 0){
                    return ['class' => 'warning'];
                }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            [
                    'attribute' => 'image',
                    'format' => 'html',
                    'value' => function($model) { return Html::img('/images/'.$model->image, ['width'=>'75']); },
                    'contentOptions'=>['style'=>'width: 50px;']
            ],
            //'intro',
            // 'text:ntext',
            [
                'attribute' => 'status',
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
            // 'seo_title',
            // 'seo_desc',
            // 'seo_keyword',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
