<?php

namespace backend\controllers;

use app\models\TransaksiPenyakit;
use backend\models\TransaksiPenyakitSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiPenyakitController implements the CRUD actions for TransaksiPenyakit model.
 */
class TransaksiPenyakitController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','updates','view'], // Aksi mana yang akan diberlakukan filter
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
     * Lists all TransaksiPenyakit models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiPenyakitSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransaksiPenyakit model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TransaksiPenyakit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TransaksiPenyakit();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Data Transaksi Penyakit berhasil disimpan.');
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
     * Updates an existing TransaksiPenyakit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Data Transaksi Penyakit berhasil disimpan.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TransaksiPenyakit model.
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

    /**
     * Finds the TransaksiPenyakit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TransaksiPenyakit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransaksiPenyakit::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
