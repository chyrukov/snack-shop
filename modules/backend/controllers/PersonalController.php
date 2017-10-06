<?php

namespace app\modules\backend\controllers;

use Yii;
use app\models\Personal;
use app\models\PersonalSearch;
use app\modules\backend\controllers\SecurityController as Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\image\ImageDriver;

/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
{
    /**
     * @inheritdoc
     */

    /**
     * Lists all Personal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personal model.
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
     * Creates a new Personal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personal();

        if ($model->load(Yii::$app->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->photo && $model->validate()) {
                $name = $model->photo->baseName.'_'.substr(uniqid(),0,8). '.' . $model->photo->extension;
                $url_image = 'images/' . $name;
                $model->photo->saveAs($url_image);
                $image = new ImageDriver();
                $image->load($url_image)->resize(170, 170, false)->save();
                $model->photo = $name;
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
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = $model->photo;

        if ($model->load(Yii::$app->request->post())) {
            $upload_image = UploadedFile::getInstance($model, 'photo');
            if ($upload_image) {
                $name = $upload_image->baseName.'_'.substr(uniqid(),0,8). '.' . $upload_image->extension;
                $url_image = 'images/' . $name;
                $upload_image->saveAs($url_image);
                $image = new ImageDriver();
                $image->load($url_image)->resize(170, 170, false)->save();
                $model->photo = $name;
                $model->save();
            }
            else {
                $model->photo = $image;
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
     * Deletes an existing Personal model.
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
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
