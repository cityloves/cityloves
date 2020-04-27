<?php
use yii\widgets\LinkPager;
?>
<a href="/adv/add"><button class="btn btn-primary">新增广告</button></a>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="<?= Yii::$app->request->get('backurl'); ?>">广告管理</a></li>
        <li class="active">广告列表</li>
    </ol>
</section>

<div class="payout-view">
    <div class="view-block">
        <h3 class="payout-title">广告列表</h3>
        <table class="table" id="baofoo-table">
            <tr>
                <td>用户名</td>
                <td>图片地址</td>
                <td>操作</td>
            </tr>
            <?php foreach ($advs as $adv): ?>
                <tr>
                    <td><?= $adv['name']; ?></td>
                    <td><?= $adv['uri']; ?></td>
                    <td>
                        <a href = '/adv/edit?id=<?= $adv['id'] ?>'><button class="btn btn-primary">编辑</button></a>
                        <a href = '/adv/delete?id=<?= $adv['id'] ?>'><button class="btn btn-primary">删除</button></a>                        
                        <a href = '<?= \Yii::$app->params['host']['backend'].$adv['uri'] ?>'><button class="btn btn-primary">预览</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?= LinkPager::widget(['pagination' => $page]); ?>
