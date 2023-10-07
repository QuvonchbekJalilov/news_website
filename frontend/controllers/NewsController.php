<?php


namespace frontend\controllers;


use common\models\News;
use yii\data\Pagination;
use yii\web\Controller;

class NewsController extends Controller
{

    public function actionCategory($id) // GET dagi id shu yerga keladi
    {
        // endi shu id boyicha bazaga sorov yuboramiz

        $models = News::find()->where(['category_id' => $id])->all();

        $pagination = new Pagination([
            'defaultPageSize' => 5, // Number of items per page
            'totalCount' => $models,
        ]);
        return $this->render('category' , [
            'models' => $models ,
            'pagination' => $pagination,
        ]);
    }
}