<?php

namespace backend\controllers;

use common\models\News;
use common\service\ExportService;
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

    public function actionExport()
    {
        $dataTitle = ['body', 'title'];
        $news = News::find();
        foreach ($news->each() as $new) {
            $exportData[] = [
                'body' => $new->body,
                'title' => $new->title
            ];
        }

        $path = \Yii::getAlias('@console/runtime/');
        $file = \Yii::getAlias('@app/runtime/'.date('YmdHis').'.xlsx');

        $objPHPExcel = ExportService::initPhpExcelObject($exportData, $dataTitle);
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//浏览器输出
header('Content-Type: application/vnd.ms-execl');
header('Content-Disposition: attachment;filename='.$file);
header('Cache-Control: max-age=0');
$objWriter->save('php://output');

        // 输出到某个地方
        //$objWriter->save($file);
    }
}
