<?php

namespace backend\controllers;

use common\models\News;
use yii\data\Pagination;
use yii\web\Controller;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $count = News::find()->count();
        $page = new Pagination(['totalCount' => $count,'pageSize'=>'5']);
        $news = News::find()
            ->offset($page->offset)
            ->limit($page->limit)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('index', ['news' => $news, 'page' => $page]);
    }

    public function actionAdd()
    {
        $post = \Yii::$app->request->post();
        // var_dump($post);die;
        $news = new News();
        if ($news->load($post) && $news->validate()) {
            $news->save();

            return $this->redirect('index');
        }
        return $this->render('add', ['model' => $news]);
    }

    public function actionEdit($id)
    {
        $news = News::findOne(['id' => $id]);
        if (\Yii::$app->request->isPost) {
            if ($news->load(\Yii::$app->request->post()) && $news->validate()) {
                $news->save();

                return $this->redirect('index');
            }
        }

        return $this->render('edit', ['model' => $news]);
    }

    public function actionTest()
    {
        return ['code' => 200, 'message' => '成功111'];
    }

    public function actionForm()
    {
        $this->layout = 'dialog';
        return $this->render('testForm');
    }
}