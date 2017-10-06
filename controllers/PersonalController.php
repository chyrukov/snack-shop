<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Personal;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;

class NewsController extends Controller {


    public function actionIndex()
    {
        
        $query = Personal::find()->active()->orderBy('date DESC');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => 10]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            //->limit(1)    
            ->all();
        
        if ($models === null) {
            throw new NotFoundHttpException;
        }
        
        return $this->render('index', [
                'models' => $models,
                'pages' => $pages,
           ]);
    }

    public function actionView($id)
    {
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    protected function findModel($id)
    {
        $model = News::find()
                    ->where(['id' => $id])
                    ->one();
        
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
