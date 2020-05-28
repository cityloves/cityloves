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

    public function actionTest()
    {
        fwrite(STDOUT, "Enter your name: ");

// get input
$name = trim(fgets(STDIN));

// write input back
fwrite(STDOUT, "Hello, $name!");
echo PHP_EOL;
if ($name == 1) {
    echo '111';
    die;
} else {
    echo '输入参数有误';
}
    }
}
