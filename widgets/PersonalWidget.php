<?php

/*Для верхнего меню*/

namespace app\widgets;

use yii\base\Widget;
use app\models\Personal;

class PersonalWidget extends Widget
{

    public function run()
    {        
        $models = Personal::find()->active()->orderBy('order')->limit(4)->all();
        return $this->render('personal', compact('models'));
    }
}
