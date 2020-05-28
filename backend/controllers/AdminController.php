<?php
namespace backend\controllers;

use common\models\Admin;
use yii\data\Pagination;
use yii\web\Controller;

class AdminController extends Controller
{
    public function actionIndex()
    {
        $count = Admin::find()->count();
        $page = new Pagination(['totalCount' => $count,'pageSize'=>'5']);
        $admins = Admin::find()
            ->offset($page->offset)
            ->limit($page->limit)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('index', ['admins' => $admins, 'page' => $page]);
    }

    public function actionAdd()
    {
        // phpinfo();
        $post = \Yii::$app->request->post();
        $admin = new Admin();
        if ($admin->load($post) && $admin->validate()) {
            $admin->passwordHash = $admin->setPassword($admin->passwordHash);
            $admin->save();
            
            return $this->redirect('index');
        }

        return $this->render('add', ['model' => $admin]);
    }

    public function actionEdit($id)
    {
        $admin = Admin::findOne(['id' => $id]);
        if (\Yii::$app->request->isPost) {
            if ($admin->load(\Yii::$app->request->post()) && $admin->validate()) {
                $admin->passwordHash = $admin->setPassword($admin->passwordHash);
                $admin->save();

                return $this->redirect('index');
            }
        }

        return $this->render('edit', ['model' => $admin]);
    }

    public function actionDelete($id)
    {
        $admin = Admin::findOne($id);
        $admin->delete();

        return $this->redirect('index');
    }
}
