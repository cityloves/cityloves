<?php

namespace backend\controllers;

use common\models\News;
use common\service\ExportService;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Response;

class NewsController extends Controller
{
        public $enableCsrfValidation = false; 
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
        //var_dump($post);die;
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

    /**
     * 图片上传
     *
     * @return array
     */
    public function actionUpload()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $php_path = \Yii::$app->basePath.'/web/upload/news';
        $php_url = '/upload/news/';
        $image_ext = ['gif', 'jpg', 'jpeg', 'png', 'bmp'];
        $max_size = 1024 * 1024 * 10;
        $save_path = '/code/backend/web/upload/news/';
        //检查目录
        if (false === \is_dir($save_path)) {
            return ['error' => 1, 'message' => '上传目录不存在'];
        }
        if (false === \file_exists($save_path)) {
            if (false === \mkdir($save_path)) {
                return ['error' => 1, 'message' => '上传目录不存在'];
            }
        }
        //检查目录写权限
        if (false === \is_writable($save_path)) {
            return ['error' => 1, 'message' => '上传目录没有写权限'];
        }
        //有上传文件时
        if (\count($_FILES['imgFile']) > 0) {
            if (0 !== $_FILES['imgFile']['error']) {
                return ['error' => 1, 'message' => '上传失败'];
            }
            //原文件名
            $file_name = $_FILES['imgFile']['name'];
            //服务器上临时文件名
            $tmp_name = $_FILES['imgFile']['tmp_name'];
            //文件大小
            $file_size = $_FILES['imgFile']['size'];
            //检查文件名
            if (empty($file_name)) {
                return ['error' => 1, 'message' => '请选择文件'];
            }
            //检查是否已上传
            if (false === \is_uploaded_file($tmp_name)) {
                return ['error' => 1, 'message' => '上传失败'];
            }
            //检查文件大小
            if ($file_size > $max_size) {
                return ['error' => 1, 'message' => '上传文件超过限制'];
            }
            //获得文件扩展名
            $temp_arr = \explode('.', $file_name);
            $file_ext = \strtolower(\trim(\array_pop($temp_arr)));
            //检查扩展名
            if (false === \in_array($file_ext, $image_ext)) {
                return ['error' => 1, 'message' => "上传文件扩展名是不允许的扩展名。\n只允许".\implode(',', $image_ext).'格式。'];
            }
            $new_file_name = \date('YmdHis').'_'.\rand(10000, 99999).'.'.$file_ext;
            $file_path = $save_path.$new_file_name;
            if (false === \move_uploaded_file($tmp_name, $file_path)) {
                return ['error' => 1, 'message' => '上传文件失败'];
            }
            @\chmod($file_path, 0644);
            $file_url = $php_url.$new_file_name;

            return ['error' => 0, 'url' => $file_url];
        } else {
            return ['error' => 1, 'message' => '请选择文件'];
        }
    }
}
