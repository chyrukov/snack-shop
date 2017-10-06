<?php

namespace app\modules\backend\controllers;

use app\modules\backend\controllers\SecurityController as Controller;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}
