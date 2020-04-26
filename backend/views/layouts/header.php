<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
// 当前页面动作
$currentAction = Yii::$app->controller->action->uniqueId;
?>

<!-- 页首 -->
<header class="main-header">
    <?= Html::a('<span class="logo-mini">'.Yii::t('app', 'corp_mini_name').'</span><span class="logo-lg">城市之光管理后台</span>', Yii::$app->homeUrl, ['class' => 'logo']); ?>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="/site/logout" class="dropdown-toggle">
                        退出登录
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>