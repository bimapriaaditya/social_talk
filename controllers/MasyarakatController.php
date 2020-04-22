<?php

namespace app\controllers;

use Yii;
use app\models\Aduan;
use app\models\Masyarakat;
use app\models\MasyarakatSearch;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * MasyarakatController implements the CRUD actions for Masyarakat model.
 */
class MasyarakatController extends Controller
{
    public $layout = 'backend/main';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Masyarakat models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (User::isMasyarakat()) {
            $this->layout = 'backend/main-masyarakat';
        }
        $searchModel = new MasyarakatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Masyarakat model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionView($id)
    {
        if (User::isMasyarakat()) {
            $this->layout = 'backend/main-masyarakat';
        }
        $searchModel = new MasyarakatSearch();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Creates a new Masyarakat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (User::isMasyarakat()) {
            $this->layout = 'backend/main-masyarakat';
        }
        $model = new Masyarakat();

        if ($model->load(Yii::$app->request->post())) {

            $MasyarakatImg = UploadedFile::getInstance($model, 'img');

            if ($MasyarakatImg !== null) {
                $MasyarakatNama = date('Ymdhis') . '_Photo-Picture_' . $model->nama . '.' . $MasyarakatImg->getExtension();
                $model->img = $MasyarakatNama;
            }
            if ($model->save()) {
                if ($MasyarakatImg !== null) {
                    $MasyarakatImg->saveAs(Yii::getAlias('@MasyarakatImgPath') . '/' . $MasyarakatNama);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Masyarakat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (User::isMasyarakat()) {
            $this->layout = 'backend/main-masyarakat';
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $MasyarakatImg = UploadedFile::getInstance($model, 'img');

            if ($MasyarakatImg !== null) {
                $MasyarakatNama = date('Ymdhis') . '_Photo-Picture_' . $model->nama . '.' . $MasyarakatImg->getExtension();
                $model->img = $MasyarakatNama;
                
            }

            if ($model->save()) {
                if ($MasyarakatImg !== null) {
                    $MasyarakatImg->saveAs(Yii::getAlias('@MasyarakatImgPath') . '/' . $MasyarakatNama);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Masyarakat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Masyarakat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Masyarakat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Masyarakat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}