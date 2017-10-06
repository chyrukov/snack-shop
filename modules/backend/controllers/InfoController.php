<?php

namespace app\modules\backend\controllers;

use Yii;
use app\models\Info;
use app\models\InfoSearch;
use app\modules\backend\controllers\SecurityController as Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\image\ImageDriver;

/**
 * PostController implements the CRUD actions for Post model.
 */
class InfoController extends Controller
{
    /**
     * @inheritdoc
     */

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Info();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->image && $model->validate()) {
                $name = $model->image->baseName.'_'.substr(uniqid(),0,8). '.' . $model->image->extension;
                $url_image = 'images/' . $name;
                $model->image->saveAs($url_image);
                $image = new ImageDriver();
                $image->load($url_image)->resize(50, 40, false)->save();
                $model->image = $name;
                if ($model->save())
                  return $this->redirect(['view', 'id' => $model->id]);
                else {
                  $errors = $model->errors;
                  exit($errors);
                }
            }
            else {
              $errors = $model->errors;
              exit(var_dump($errors));
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        else {
            return $this->render('create', [
                    'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;

        if ($model->load(Yii::$app->request->post())) {
            $upload_image = UploadedFile::getInstance($model, 'image');
            if ($upload_image) {
                $name = $upload_image->baseName.'_'.substr(uniqid(),0,8). '.' . $upload_image->extension;
                $url_image = 'images/' . $name;
                $upload_image->saveAs($url_image);
                $image = new ImageDriver();
                $image->load($url_image)->resize(50, 40, false)->save();
                $model->image = $name;
                $model->save();
            }
            else {
                $model->image = $image;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Info::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
