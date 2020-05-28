<?php
use yii\widgets\LinkPager;
?>
<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="/js/showres.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/layer/layer.min.js"></script>
<a href="/role/add"><button class="btn btn-primary">新增角色</button></a>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="<?= Yii::$app->request->get('backurl'); ?>">角色管理</a></li>
        <li class="active">角色列表</li>
    </ol>
</section>

<div class="payout-view">
    <div class="view-block">
        <h3 class="payout-title">角色列表</h3>
        <table class="table" id="baofoo-table">
            <tr>
                <td>标题</td>
                <td>图片地址</td>
                <td>操作</td>
            </tr>
            <?php foreach ($news as $new): ?>
                <tr>
                    <td><?php echo $new->sn; ?></td>
                    <td><?php echo $new->roleName; ?></td>
                    <td>
                        <a href = '/news/edit?id=<?= $new['id'] ?>'><button class="btn btn-primary">编辑</button></a>
                        <a href = '/news/delete?id=<?= $new['id'] ?>'><button class="btn btn-primary">删除</button></a>                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?= LinkPager::widget(['pagination' => $page]); ?>
