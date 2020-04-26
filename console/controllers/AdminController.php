<?php
namespace console\controllers;

use yii\console\Controller;
use common\models\Admin;

class AdminController extends Controller
{
    public function actionCreate($username, $password)
    {
        $admin = Admin::initNew($username, $password);

        $admin->save();
    }
}
