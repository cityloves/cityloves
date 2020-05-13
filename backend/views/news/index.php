<?php
use yii\widgets\LinkPager;
?>
<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="/js/showres.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/layer/layer.min.js"></script>
<script>
    function loadDialog(title, url, width = 400, height = 300)
    {
        layer.open({
            'type': 2,
            'title': title,
            'content': url,
            'area': [width+'px', height+'px'],
        });
    }
    </script>

<a href="/news/add"><button class="btn btn-primary">新增新闻</button></a>

<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="<?= Yii::$app->request->get('backurl'); ?>">新闻管理</a></li>
        <li class="active">新闻列表</li>
    </ol>
</section>

<div class="payout-view">
    <div class="view-block">
        <h3 class="payout-title">新闻列表</h3>
        <table class="table" id="baofoo-table">
            <tr>
                <td>标题</td>
                <td>图片地址</td>
                <td>操作</td>
            </tr>
            <?php foreach ($news as $new): ?>
                <tr>
                    <td><?= $new['title']; ?></td>
                    <td><?= $new['uri']; ?></td>
                    <td>
                        <a href = '/news/edit?id=<?= $new['id'] ?>'><button class="btn btn-primary">编辑</button></a>
                        <a href = '/news/delete?id=<?= $new['id'] ?>'><button class="btn btn-primary">删除</button></a>                        
                        <a href = '<?= \Yii::$app->params['host']['backend'].$new['uri'] ?>'><button class="btn btn-primary">预览</button></a>
                        <a href="javascript:test()" class="btn mini green"><button class="btn btn-primary">测试</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<script>
    function test() {
        loadDialog('测试', '/news/form', 600, 400)
    }
</script>
