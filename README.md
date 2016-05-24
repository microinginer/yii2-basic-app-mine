Yii 2 Basic Project For Me
============================

php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
php yii migrate/up --migrationPath=@yii/rbac/migrations

php yii user/create email@example.com username password
php yii rbac/create-role roleName
php yii assign/role username roleName
