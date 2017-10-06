<?php

/*Для верхнего меню*/

namespace app\widgets;

use yii\base\Widget;
use app\models\Info;

class InfoWidget extends Widget
{

    public function run()
    {        
        $models = Info::find()->active()->limit(3)->all();
        return $this->render('info', compact('models'));
    }
}
