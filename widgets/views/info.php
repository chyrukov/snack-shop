<div class="row">
<?php foreach($models as $model):?>
    <div class="col-md-4 col-xs-12">
        
        <div class="media">
            <div class="media-left">
                <?= \yii\bootstrap\Html::img('/images/'.$model->image)?>
            </div>
            <div class="media-body">
              <h4 class="media-heading"><?= $model->title?></h4>
            </div>
        </div>    
        <p><?= $model->text?></p>
    </div>
<?php endforeach;?>
</div>

