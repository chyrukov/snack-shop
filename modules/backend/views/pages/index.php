<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'text:ntext',
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
            'alias',
            // 'tag',
            // 'view',
            // 'date',
            // 'slug',
            // 'seo_title',
            // 'seo_desc',
            // 'seo_keyword',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
