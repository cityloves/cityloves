# 基于 Yii2 的项目模板

## 环境配合

配置了以下服务（service）：

| 服务名 | 主进程 | 说明
| --- | --- | ---
| mysql | MySQL 5.7 数据库 | 首次启动时自动创建 app（开发）、app_test（测试）数据库
| php | Supervisor 进程管理器 | 管理 PHP-FPM、定时任务和其他常驻进程
| nginx | Nginx 1.14 HTTP 服务器 | ~ |

目录结构
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

## 上线步骤

- composer install
- 新增.env配置数据库
- 执行 php yii migrate/up
- 配置common/config/params-local.php
 - 新增前端和后端的域名
 - ...
