<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Category;
use dvizh\tree\widgets\Tree;
//use kartik\export\ExportMenu;

$this->title = 'Категории';
$this->params['breadcrumbs'][] = ['label' => 'Магазин', 'url' => ['/shop/default/index']];
$this->params['breadcrumbs'][] = $this->title;

//\dvizh\shop\assets\BackendAsset::register($this);
?>
<div class="category-index">
    
    <div class="row">
        <?php if(yii::$app->request->get('view') == 'list') { ?>
            <div class="col-md-1">
                <?= Html::tag('button', 'Удалить', [
                    'class' => 'btn btn-success dvizh-mass-delete',
                    'disabled' => 'disabled',
                    'data' => [
                        'model' => $dataProvider->query->modelClass,
                    ],
                ]) ?>
            </div>
        <?php } ?>
        <div class="col-md-2">
            <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-md-4">
            <?php
            $gridColumns = [
                'id',
                'name',
            ];

            /*echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns
            ]);*/
            ?>
        </div>
    </div>

    <br style="clear: both;"></div>   
    <br style="clear: both;">
    <?php
    
        $categories = Tree::widget(['model' => new Category()]);
    
    
    echo $categories;
    ?>

</div>
