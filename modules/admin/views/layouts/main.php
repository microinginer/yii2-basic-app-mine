<?php
/**
 * @var $content string
 * @var $this yii\web\View
 */

\app\modules\admin\assets\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= yii\bootstrap\Html::csrfMetaTags() ?>
    <title><?= yii\bootstrap\Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?= \yii\helpers\Url::to(['/admin']) ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b><?= Yii::$app->name[0] ?></b></span>
            <!-- logo for regular state and mobile devices -->
            <?php if (Yii::$app->user->can('admin')): ?>
                <span class="logo-lg"><b><?= Yii::$app->name ?></b></span>
            <?php else: ?>
                <span class="logo-lg"><b>Admin
                        <small style="font-size: 9px;">by iAuto<i class="ion ion-social-sass"></i></small>
                    </b></span>
            <?php endif; ?>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img
                                src="<?= Yii::$app->user->identity->profile->getAvatarUrl(50) ?>"
                                class="user-image" alt="User Image">
                            <span
                                class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img
                                    src="<?= Yii::$app->user->identity->profile->getAvatarUrl(240) ?>"
                                    class="img-circle" alt="User Image">
                                <p>
                                    <?= Yii::$app->user->identity->username ?>
                                    <br>
                                    <small></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Профиль</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= yii\helpers\Url::to(['/user/security/logout']) ?>" data-method="post"
                                       class="btn btn-default btn-flat">Выход</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar" style="height: auto;">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= Yii::$app->user->identity->profile->getAvatarUrl(150) ?>"
                         class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= Yii::$app->user->identity->username ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Поиск...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <?= yii\widgets\Menu::widget([
                'options' => ['class' => 'sidebar-menu'],
                'items' => \yii\helpers\ArrayHelper::merge([
                    ['label' => 'Навигация', 'options' => ['class' => 'header']],
                    [
                        'label' => yii\bootstrap\Html::tag('i', '', ['class' => 'fa fa-reply']) . ' &nbsp; ' . yii\bootstrap\Html::tag('span', Yii::t('app', 'Go to site')),
                        'url' => ['/site/index']
                    ],
                    [
                        'label' => yii\bootstrap\Html::tag('i', '', ['class' => 'ion-ios-people']) . ' &nbsp; ' . yii\bootstrap\Html::tag('span', Yii::t('app', 'Пользователи')),
                        'url' => ['/user/admin'],
                        'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                        'visible' => Yii::$app->user->can('admin'),
                        'options' => ['class' => 'treeview'],
                        'items' => [
                            ['label' => Yii::t('app', 'Список'), 'url' => ['/user/admin/index'],],
                            ['label' => Yii::t('rbac', 'Roles'), 'url' => ['/rbac/role/index'],],
                            ['label' => Yii::t('rbac', 'Permissions'), 'url' => ['/rbac/permission/index'],],
                            [
                                'label' => Yii::t('rbac', 'Create'),
                                'url' => ['/rbac/permission/index'],
                                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                                'items' => [
                                    [
                                        'label' => Yii::t('rbac', 'New user'),
                                        'url' => ['/user/admin/create'],
                                        'visible' => isset(Yii::$app->extensions['dektrium/yii2-user']),
                                    ],
                                    [
                                        'label' => Yii::t('rbac', 'New role'),
                                        'url' => ['/rbac/role/create']
                                    ],
                                    [
                                        'label' => Yii::t('rbac', 'New permission'),
                                        'url' => ['/rbac/permission/create']
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => yii\bootstrap\Html::tag('i', '', ['class' => 'fa fa-connectdevelop']) . ' &nbsp; ' . yii\bootstrap\Html::tag('span', Yii::t('app', 'Developer options')),
                        'url' => ['/user/admin'],
                        'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                        'visible' => Yii::$app->user->can('admin'),
                        'options' => ['class' => 'treeview'],
                        'items' => [
                            ['label' => Yii::t('app', 'Gii'), 'url' => ['/gii'], 'linkOptions' => [
                                'target' => '_blank'
                            ]],
                        ],
                    ],
                ], Yii::$app->getModule('admin')->sidebarMenuItems),
                'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
                'encodeLabels' => false, //allows you to use html in labels
                'activateParents' => true,
            ]);
            ?>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><?= $this->title ?></h1>
            <?= yii\widgets\Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Главная',
                    'url' => ['/admin/default/index'],
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>
        <section class="content">
            <?= $content ?>
            <div class="clearfix"></div>
        </section>
    </div>
    <footer class="main-footer">
        Powered by <?= yii\bootstrap\Html::a('iAutobank', 'http://iautobank.ru') ?> <i class="ion ion-social-sass"></i>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
