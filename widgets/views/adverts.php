<?php foreach($models as $model):?>    
            <p><?= $model->text?></p>
            <small><?= Yii::$app->formatter->asDate($model->updated)?></small>
            <br>
<?php endforeach;?>

