<?php
use yii\widgets\LinkPager;
?>
<a href="/admin/add"><button class="btn btn-primary">新增用户</button></a>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="<?= Yii::$app->request->get('backurl'); ?>">用户管理</a></li>
        <li class="active">用户列表</li>
    </ol>
</section>

<div class="payout-view">
    <div class="view-block">
        <h3 class="payout-title">用户列表</h3>
        <table class="table" id="baofoo-table">
            <tr>
                <td>用户名</td>
                <td>操作</td>
            </tr>
            <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?= $admin['username']; ?></td>
                    <td>
                        <a href = '/admin/edit?id=<?= $admin['id'] ?>'><button class="btn btn-primary">编辑</button></a>
                        <a href = '/admin/delete?id=<?= $admin['id'] ?>'><button class="btn btn-primary">删除</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?= LinkPager::widget(['pagination' => $page]); ?>