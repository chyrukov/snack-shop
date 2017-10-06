<?php

namespace app\modules\backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Uprofile;
use app\models\Users;
use app\models\PasswordForm;
use dektrium\user\helpers\Password;

/**
 * TravelController implements the CRUD actions for Travel model.
 */
class UprofileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
      return [
        'access' => [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['update', 'index', 'change-password', 'change-email'],
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
     * Lists all Travel models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionChangeEmail(){
        
        $model = $this->findModelUsers();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Account details have been updated'));
            return $this->refresh();
        } else {
            return $this->render('change-email', [
                'model' => $model,
            ]);
        }
        
    }
    
    public function actionChangePassword(){
        
        $model = $this->findModelUsers();
        $form_model = new PasswordForm();
        if ($form_model->load(Yii::$app->request->post())) {
            if ($form_model->validate()){
                $model->password_hash = Password::hash($form_model->password);
                $model->save();
            } 
            else {
                return $this->render('change-password', [
                    'model' => $form_model,
                ]);
            }
            
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Account details have been updated'));
            return $this->refresh();
        } else {
            return $this->render('change-password', [
                'model' => $form_model,
            ]);
        }
        
    }

    /**
     * Displays a single Travel model.
     * @param integer $id
     * @return mixed
     */
    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Travel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new Travel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_travel]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Travel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = $this->findModel();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = \Yii::$app->user->id;
            if ($model->save(false)){
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
                'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Travel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /*public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Travel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Travel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel()
    {
        $model = Uprofile::find()->where(['user_id' => \Yii::$app->user->id])->one();
        if ($model !== null) {
            return $model;
        } else {
            $model = new Uprofile();
            return $model;
        }
    }
    protected function findModelUsers()
    {
        $model = Users::findOne(\Yii::$app->user->id);
        if ($model !== null) {
            return $model;
        } else {
            return $false;
        }
    }
}
