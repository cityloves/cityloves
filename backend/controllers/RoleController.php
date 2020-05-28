<?php
namespace backend\controllers;

use common\models\Role;
use yii\web\Controller;
use yii\data\Pagination;

class RoleController extends Controller
{
    public function actionIndex()
    {
        $count = Role::find()->count();
        $page = new Pagination(['totalCount' => $count,'pageSize'=>'5']);
        $news = Role::find()
            ->offset($page->offset)
            ->limit($page->limit)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('index', ['news' => $news, 'page' => $page]);
    }

    public function actionAdd()
    {
        $post = \Yii::$app->request->post();
        $role = new Role();

        if ($role->load($post) && $role->validate() && $role->save()) {
            return $this->redirect('index');
        }

        return $this->render('add', ['model' => $role]);
    }
}
