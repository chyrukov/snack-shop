<?php

/*Для верхнего меню*/

namespace app\widgets;

use yii\base\Widget;
use app\models\Pages;

class AdvertsWidget extends Widget
{

    public function run()
    {        
        $models = Pages::find()->advert()->active()->orderBy('updated DESC')->limit(2)->all();
        return $this->render('adverts', compact('models'));
    }
}
