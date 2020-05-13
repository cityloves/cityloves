<?php $this->beginPage(); ?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        body {
            padding: 10px;
        }
    </style>
</head>

<?php $this->beginBody(); ?>
<body>
    <?= $content; ?>

    <script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="/js/showres.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/layer/layer.min.js"></script>
    <script>
        // 如果是在弹层加载的，则在调用页关闭弹层
        function closeDialog() {
            // 如果不是被layer弹层加载，则退出
            if (typeof parent.layer === 'undefined') {
                return;
            }

            var index = parent.layer.getFrameIndex(window.name);
            parent.layer.close(index);
        }
    </script>
</body>
<?php $this->endBody(); ?>

</html>
<?php $this->endPage(); ?>