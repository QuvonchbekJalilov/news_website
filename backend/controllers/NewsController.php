<?php

namespace backend\controllers;

use common\components\StaticFunctions;
use common\models\News;
use common\models\NewsImage;
use common\models\NewsSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
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
     * Lists all News models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new News();
        

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $image = UploadedFile::getInstance($model , 'image'); //formadan kelayotgan imageni $image ozgaruvchisiga ozlashtirib olyapmiz
                //endi rasmni mavjudlikka tekshiramiz
                if ($image){
                    //agar image boladigan bolsa $model->image ga shu $imageni uzlashtiramiz va saqlaymiz
                    //Stativ functionni ozini saveIMage metofi bor
                    //File = image
                    //POST_ID $modelning idsi
                    // POST_TYPE table nomi (bizda news) bu funksiyani ozi frontend/web/uploads/news/id/images shu pathda saqlaydi
                    $model->image = StaticFunctions::saveImage($image , $model->id , 'news');
                    $model->save();
                }

                if ($model->save()){ // agar hammasi save qilinsa view ga junatadi
                    return  $this->redirect(['view' , 'id' => $model->id]);
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    //Update qilish ham huddi shunaqa faqat birinchieski rasmni olvolish kk boladi
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;
        if ($this->request->isPost && $model->load($this->request->post())) { //bunda saveni oxirida qilamiz boshqa controllerdan ham update image yuklamoqchi bolsayiz save ni olib tashlab ishlaysiz

            // bu yerdayam huddi create dagidek $imagega rasmni olamiz
            $image = UploadedFile::getInstance($model , 'image');
            //ifga tekshiramiz
            if ($image){
                $model->image = StaticFunctions::saveImage($image,$model->id , 'news');// bu yangi rasm buni saqlagandan keyin eskisini uchirish kk
                //StaticFunctionsni ozini deleteImage metodi bor
                //bu imageFile tepadagi oldImage boladi
                StaticFunctions::deleteImage($oldImage , $model->id , 'news');
            }else{
                $model->image  = $oldImage; // agar rasmni update qilmay boshqa narsalarni update qilsayiz modelning imagesi shu ozini oldingi imagesi bop tururadi
            }

            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
