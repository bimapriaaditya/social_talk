<?php

namespace app\controllers;

use Yii;
use app\models\Aduan;
use app\models\AduanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * AduanController implements the CRUD actions for Aduan model.
 */
class AduanController extends Controller
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
     * Lists all Aduan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AduanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUserIndex()
    {
        $searchModel = new AduanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('user_index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aduan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Aduan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aduan();

        if ($model->load(Yii::$app->request->post())) {

            $Bukti1Img = UploadedFile::getInstance($model, 'img_bukti_1');
            $Bukti2Img = UploadedFile::getInstance($model, 'img_bukti_2');
            $Bukti3Img = UploadedFile::getInstance($model, 'img_bukti_3');

            if ($Bukti1Img !== null) {
                $Bukti1Nama = date('Ymdhis') . '_UPLOADED-BUKTI_1_' . $model->nama . '_' . $model->tanggal . '.' . $Bukti1Img->getExtension();
                $model->img_bukti_1 = $Bukti1Nama;
                $Bukti1Img->saveAs(Yii::getAlias('@Bukti1ImgPath') . '/' . $Bukti1Nama);
            }

            if ($Bukti2Img !== null) {
                $Bukti2Nama = date('Ymdhis') . '_UPLOADED-BUKTI_2_' . $model->nama . '_' . $model->tanggal . '.' . $Bukti2Img->getExtension();
                $model->img_bukti_2 = $Bukti2Nama;
                $Bukti2Img->saveAs(Yii::getAlias('@Bukti2ImgPath') . '/' . $Bukti2Nama);
            }

            if ($Bukti3Img !== null) {
                $Bukti3Nama = date('Ymdhis') . '_UPLOADED-BUKTI_3_' . $model->nama . '_' . $model->tanggal . '.' . $Bukti3Img->getExtension();
                $model->img_bukti_3 = $Bukti3Nama;
                $Bukti3Img->saveAs(Yii::getAlias('@Bukti3ImgPath') . '/' . $Bukti3Nama);
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Aduan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $Bukti1Img = UploadedFile::getInstance($model, 'img_bukti_1');
            $Bukti2Img = UploadedFile::getInstance($model, 'img_bukti_2');
            $Bukti3Img = UploadedFile::getInstance($model, 'img_bukti_3');

            if ($Bukti1Img !== null) {
                $Bukti1Nama = date('Ymdhis') . '_UPLOADED-BUKTI_1_' . $model->nama . '_' . $model->tanggal . '.' . $Bukti1Img->getExtension();
                $model->img_bukti_1 = $Bukti1Nama;
                $Bukti1Img->saveAs(Yii::getAlias('@Bukti1ImgPath') . '/' . $Bukti1Nama);
            }

            if ($Bukti2Img !== null) {
                $Bukti2Nama = date('Ymdhis') . '_UPLOADED-BUKTI_2_' . $model->nama . '_' . $model->tanggal . '.' . $Bukti2Img->getExtension();
                $model->img_bukti_2 = $Bukti2Nama;
                $Bukti2Img->saveAs(Yii::getAlias('@Bukti2ImgPath') . '/' . $Bukti2Nama);
            }

            if ($Bukti3Img !== null) {
                $Bukti3Nama = date('Ymdhis') . '_UPLOADED-BUKTI_3_' . $model->nama . '_' . $model->tanggal . '.' . $Bukti3Img->getExtension();
                $model->img_bukti_3 = $Bukti3Nama;
                $Bukti3Img->saveAs(Yii::getAlias('@Bukti3ImgPath') . '/' . $Bukti3Nama);
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Aduan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        $model->deleteFile1();
        $model->deleteFile2();
        $model->deleteFile3();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Aduan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aduan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aduan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
