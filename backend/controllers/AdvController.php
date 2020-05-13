<?php
namespace backend\controllers;

use common\models\Adv;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\UploadedFile;

class AdvController extends Controller
{
    public function actionIndex()
    {
        $count = Adv::find()->count();
        $page = new Pagination(['totalCount' => $count,'pageSize'=>'5']);
        $advs = Adv::find()
            ->offset($page->offset)
            ->limit($page->limit)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('index', ['advs' => $advs, 'page' => $page]);
    }

    public function actionAdd()
    {
        $post = \Yii::$app->request->post();
        var_dump($post);die;
        $adv = new Adv();

        if ($adv->load($post) && $adv->validate()) {
            $this->uploadImage($adv);
            $adv->save();

            return $this->redirect('index');
        }

        return $this->render('add', ['model' => $adv]);
    }

    /**
     * 本地上传图片.
     */
    private function uploadImage(Adv $adv)
    {
        $uploadFile = UploadedFile::getInstance($adv, 'uri');

        if (empty($uploadFile)) {
            return false;
        }

        $path = \Yii::getAlias('@backend').'/web/upload/picture';

        if (!\file_exists($path)) {
            \mkdir($path, 777);
        }

        $picPath = 'upload/picture/'.\time().\rand(100000, 999999).'.'.$uploadFile->extension;
        $uploadFile->saveAs($picPath);

        $adv->uri = $picPath;

        return true;
    }

    public function actionDelete($id)
    {
        $adv = Adv::findOne(['id' => $id]);
        $adv->delete();

        return $this->redirect('index');
    }
}