<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Лучшая цена';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="best-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_best',
            [
                'attribute' => 'type',
                'format' => 'html',
                'value' => function($model) { 
                        if ($model->type == 0) return "Зеленая карта";
                        if ($model->type == 1) return "ОСАГО";
                        if ($model->type == 2) return "Путешествия";
                    },
            ],
            'price',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}'
            ],
        ],
    ]); ?>
</div>
