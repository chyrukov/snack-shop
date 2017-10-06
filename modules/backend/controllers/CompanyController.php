<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Company;
use app\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\image\ImageDriver;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
          'access' => [
              'class' => AccessControl::className(),
              'only' => ['index','logout'],
              'rules' => [
                  [
                      'actions' => ['index','logout'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
          ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
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
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $model = new Company();

      if ($model->load(Yii::$app->request->post())) {
          $model->logo = UploadedFile::getInstance($model, 'logo');
          if ($model->logo && $model->validate()) {
              $name = $model->logo->baseName.'_'.substr(uniqid(),0,8). '.' . $model->logo->extension;
              $url_image = 'images/' . $name;
              $model->logo->saveAs($url_image);
              $image = new ImageDriver();
              $image->load($url_image)->resize(380, 133,false)->save();
              $model->logo = $name;
              if ($model->save())
                return $this->redirect(['view', 'id' => $model->id_company]);
              else {
                $errors = $model->errors;
                exit($errors);
              }
          }
          else {
            $errors = $model->errors;
            //exit(var_dump($errors));
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
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      $model = $this->findModel($id);
      $image = $model->logo;
      $user = Yii::$app->user;
      $userId = $user->id;

      if ($model->load(Yii::$app->request->post())) {
          $upload_image = UploadedFile::getInstance($model, 'logo');
          if ($upload_image) {
              $name = $upload_image->baseName.'_'.substr(uniqid(),0,8). '.' . $upload_image->extension;
              $url_image = 'images/' . $name;
              $upload_image->saveAs($url_image);
              $image = new ImageDriver();
              $image->load($url_image)->resize(100, 75, false)->save();
              $model->logo = $name;
              $model->save();
          }
          else {
              $model->logo = $image;
              $model->save();
          }
          return $this->redirect('index');
      }
      else {
          return $this->render('update', [
                      'model' => $model,
          ]);
      }
    }

    /**
     * Deletes an existing Company model.
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
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
