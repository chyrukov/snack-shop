<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страховые компании';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                    'attribute' => 'type',
                    'value' => function($model) { 
                            if ($model->type == 0) return "ОСАГО";
                            if ($model->type == 1) return "Зеленая карта";
                            if ($model->type == 2) return "Все";
                    },
            ],
            [
                    'attribute' => 'type',
                    'format' => 'html',
                    'value' => function($model) { 
                        
                        return Html::img('@web/images/'.$model->logo, ['width'=>'75']); 
                        
                    },
            ],
            'bonus',
            'fran',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
