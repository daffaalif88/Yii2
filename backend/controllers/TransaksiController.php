<?php

namespace backend\controllers;

use app\models\TransaksiPenyakit;
use backend\models\Transaksi;
use backend\models\TransaksiObat;
use backend\models\TransaksiSearch;
use backend\models\TransaksiTindakan;
use kartik\mpdf\Pdf;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiController implements the CRUD actions for Transaksi model.
 */
class TransaksiController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'updates', 'view','print'], // Aksi mana yang akan diberlakukan filter
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // Membutuhkan pengguna yang sudah login (authentikasi)
                    ],
                ],
            ],
        ];
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Transaksi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transaksi model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);
        $transaksiObat = TransaksiObat::find()->where(['id_transaksi' => $id])->all();
        $transaksiTindakan = TransaksiTindakan::find()->where(['id_transaksi' => $id])->all();
        $transaksiPenyakit = TransaksiPenyakit::find()->where(['id_transaksi' => $id])->all();
        
        // untuk create pada tabel
        $model2 = new TransaksiObat();
        $model3 = new TransaksiTindakan();
        $model4 = new TransaksiPenyakit();
       

        // if ($this->request->isPost) {
            if ($model2->load($this->request->post()) && $model2->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            if ($model3->load($this->request->post()) && $model3->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            if ($model4->load($this->request->post()) && $model4->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        // } else {
        //     $model2->loadDefaultValues();
        // }

        return $this->render('view', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
            'model4' => $model4,
            'transaksiObat' => $transaksiObat,
            'transaksiTindakan' => $transaksiTindakan,
            'transaksiPenyakit' => $transaksiPenyakit,
        ]);
    }

    /**
     * Creates a new Transaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Transaksi();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Transaksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Transaksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteObat($id)
    {
        $model = $this->findModel($id);
        $this->findModelObat($id)->delete();
        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPrint($id)
    {
        $model = $this->findModel($id); // Metode untuk mendapatkan model berdasarkan ID
        // Hitung total harga
        $totalHarga = $model->getTotalHarga();

        // Update model dengan total harga
        $model->total_harga = $totalHarga;
        if (!$model->save()) {
            Yii::$app->session->setFlash('error', 'Gagal menyimpan total harga.');
            return $this->redirect(['view', 'id' => $id]);
        }

        $transaksiObat = TransaksiObat::find()->where(['id_transaksi' => $id])->all();
        $transaksiTindakan = TransaksiTindakan::find()->where(['id_transaksi' => $id])->all();
        $transaksiPenyakit = TransaksiPenyakit::find()->where(['id_transaksi' => $id])->all();

        // Membuat konten HTML untuk PDF
        $content = $this->renderPartial('print', [
            'model' => $model,
            'transaksiObat' => $transaksiObat,
            'transaksiTindakan' => $transaksiTindakan,
            'transaksiPenyakit' => $transaksiPenyakit,
        ]);

        // Konfigurasi PDF
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // mode default
            'format' => Pdf::FORMAT_A4, // format A4
            'orientation' => Pdf::ORIENT_PORTRAIT, // orientasi potret
            'destination' => Pdf::DEST_BROWSER, // tampilkan di browser
            'content' => $content, // konten yang akan dicetak
            'options' => [
                'title' => 'Judul Dokumen',
                'subject' => 'Deskripsi Dokumen'
            ],
            'methods' => [
                'SetHeader' => ['Laporan Transaksi Medis Rumah Sakit Daffa Sentosa||Tanggal: ' . date('d-m-Y')],
                'SetFooter' => ['By Muhammad Daffa Nur Alif||{PAGENO}'], // Footer dengan nomor halaman
            ]
            
        ]);

        // Render PDF
        return $pdf->render();
    }
    /**
     * Finds the Transaksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Transaksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transaksi::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //Coba Model 
    protected function findModelObat($id)
    {
        if (($model = TransaksiObat::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}