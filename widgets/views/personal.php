<div class="row">
    <?php foreach($models as $model):?>

        <div class="col-md-3 col-xs-12"> 
            <?= \yii\bootstrap\Html::img('/images/'.$model->photo,['class' => 'img-circle'])?>
                  <h4 class="media-heading"><?= $model->name?></h4>
                  <p><?= $model->position?></p>
        </div>

    <?php endforeach;?>
    <?= yii\helpers\HTML::a('Весь персонал',['/personal'], ['role' => 'button', 'class' => 'btn btn-primary'])?>
</div>

