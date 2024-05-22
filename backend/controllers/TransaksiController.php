<?php

namespace backend\controllers;

use app\models\TransaksiPenyakit;
use backend\models\Pasien;
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
                        'matchCallback' => function ($rule, $action) {
                            // Daftar username yang diizinkan
                            $allowedUsernames = ['admin','dokter'];
                            // Memeriksa apakah username pengguna ada dalam daftar yang diizinkan
                            return in_array(Yii::$app->user->identity->username, $allowedUsernames);
                        },
                    ],
                ],
            ],
        ];
        // return array_merge(
        //     parent::behaviors(),
        //     [
        //         'verbs' => [
        //             'class' => VerbFilter::className(),
        //             'actions' => [
        //                 'delete' => ['POST'],
        //             ],
        //         ],
        //     ]
        // );
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

        // Menampilkan data tabel
        $model = $this->findModel($id);
        $transaksiObat = TransaksiObat::find()->where(['id_transaksi' => $id])->all();
        $transaksiTindakan = TransaksiTindakan::find()->where(['id_transaksi' => $id])->all();
        $transaksiPenyakit = TransaksiPenyakit::find()->where(['id_transaksi' => $id])->all();
        $pasien = $model->pasien;
        
        // untuk create pada tabel
        $model2 = new TransaksiObat();
        $model3 = new TransaksiTindakan();
        $model4 = new TransaksiPenyakit();
       

        // if ($this->request->isPost) {
            // Transaksi Obat
            if ($model2->load($this->request->post()) && $model2->save()) {
                return $this->redirect(['view', 'id' => $model->id, '#' => 'transaksi-obat']);
            }
            // Transaksi Tindakan
            if ($model3->load($this->request->post()) && $model3->save()) {
                return $this->redirect(['view', 'id' => $model->id, '#' => 'transaksi-tindakan']);
            }
            // Transaksi Penyakit
            if ($model4->load($this->request->post()) && $model4->save()) {
                return $this->redirect(['view', 'id' => $model->id, '#' => 'transaksi-penyakit']);
            }
            // Update form lunas
            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Data Pasien berhasil disimpan.');
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
            'pasien' => $pasien,
            // 'selectedTransaksiId' => $id,
        ]);
    }

    public function getPasien()
    {
        return $this->hasOne(Pasien::className(), ['id' => 'pasien_id']);
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
                Yii::$app->session->setFlash('success', 'Data Transaksi berhasil disimpan.');
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
            Yii::$app->session->setFlash('success', 'Data Pasien berhasil disimpan.');
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
 

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    //Coba Delete 
    public function actionDeleteObat($id)
    {
        // Yii::debug("Delete action called for obat with ID: $id", __METHOD__);
        // Logika penghapusan di sini
        // $model = $this->findModel($id);
        // $this->findModelObat($id)->delete();
        // return $this->redirect(['view', 'id' => $model->id]);

        $model = $this->findModelObat($id);
        $transaksiId = $model->id_transaksi;  // asumsi bahwa transaksi_id ada
        if ($model->delete()) {
            return $this->redirect(['view', 'id' => $transaksiId]);
        } else {
            Yii::error("Penghapusan gagal untuk ID: {$id}", __METHOD__);
            return $this->redirect(['index']); // Atau halaman error khusus
        }
    }
    public function actionDeleteTindakan($id)
    {
        // $model = $this->findModel($id);
        // $this->findModelTindakan($id)->delete();
        // return $this->redirect(['view', 'id' => $model->id]);

        $model = $this->findModelTindakan($id);
        $transaksiId = $model->id_transaksi;  // asumsi bahwa transaksi_id ada
        if ($model->delete()) {
            return $this->redirect(['view', 'id' => $transaksiId]);
        } else {
            Yii::error("Penghapusan gagal untuk ID: {$id}", __METHOD__);
            return $this->redirect(['index']); // Atau halaman error khusus
        }
    }
    public function actionDeletePenyakit($id)
    {
        $model = $this->findModelPenyakit($id);
        $transaksiId = $model->id_transaksi;  // asumsi bahwa transaksi_id ada
        if ($model->delete()) {
            return $this->redirect(['view', 'id' => $transaksiId]);
        } else {
            Yii::error("Penghapusan gagal untuk ID: {$id}", __METHOD__);
            return $this->redirect(['index']); // Atau halaman error khusus
        }
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
                'SetHeader' => ['Laporan Transaksi Medis Klinik Daffa Sentosa||Tanggal: ' . date('d-m-Y')],
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

    //Coba Model Obat 
    protected function findModelObat($id)
    {
        if (($model = TransaksiObat::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Coba Model TransaksiTindakan
    protected function findModelTindakan($id)
    {
        if (($model = TransaksiTindakan::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Coba Mode TransaksiPenyakit
    protected function findModelPenyakit($id)
    {
        if (($model = TransaksiPenyakit::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
}