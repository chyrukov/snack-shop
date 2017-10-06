<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Politic */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="politic-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            [
               'attribute' => 'image',
                'format' => 'html',
                'value' => Html::img('@web/images/'.$model->image, ['height'=>'150']),
            ],
            'text:html',
            [
               'attribute' => 'status',
               'value' => ($model->status == 1) ? 'Активный' : 'Заблокирован',
            ],
            'seo_title',
            'seo_desc',
            'seo_keyword',
        ],
    ]) ?>

</div>
