<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\widgets\Menu;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
       /* 'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,*/
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $oldMenuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
        ['label'=> 'Say', 'url'=>['/site/say']],

        Yii::$app->user->isGuest ? (['label' => 'Login', 'url' => ['/site/login']]) :
            ('<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout'])
                . Html::endForm()
                . '</li>')
    ];

    $menuItems = [['label'=>'Главная', 'url'=>['/site/index']],
                ['label'=>'Статус', 'items'=>
                    [
                        ['label'=>'Создать', 'url'=>['/staatus/create']]
                    ]
                ]];


    if (!Yii::$app->user->isGuest){
        $menuItems = array_merge($menuItems,
            [['label' => 'Меню пользователя',
                'items' => [ // первый уровень
                    ['label' => 'Страницы', 'url' => Url::to(['/pages/pages'])], // второй уровень
                    ['label' => 'Комментарии', 'url' => Url::to(['/pages/comments'])],
                    ['label' => 'Теги', 'url' => Url::to(['/pages/tags'])],
                    ['label' => 'Меню', 'url' => Url::to(['/menus'])],
                ]],
                [
                'label'=>'Выйти('. Yii::$app->user->identity->username . ')',
                'url' =>Url::to(['/site/logout']),
            'linkOptions' => ['data-method' => 'post']]]);

    }else {
        $menuItems[] = ['label' => 'Войти', 'url' => Url::to(['/site/login'])];
    }
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right collapse navbar-collapse'],
        'items' => $menuItems,
    ]);

//    echo Menu::widget([
//        'options' => ['class' => 'nav navbar-nav collapse navbar-collapse'],
//        'submenuTemplate' => '<ul role="menu" class="sub-menu">{items}</ul>'."\n",
//        'items' => [
//            ['label' => 'Межкомнатные двери', 'url' => 'category/2'],
//            [
//                'label' => 'Металлические двери',
//                'url' => ['category/4'],
//                'template' => '<a href="{url}">{label}<i class="fa fa-angle-down"></i></a>'."\n",
//                'options' => [
//                    'class' => 'dropdown',
//                ],
//                'items' => [
//                    ['label' => 'Inside1', 'url' => 'category/17'],
//                    ['label' => 'Inside2', 'url' => 'category/24'],
//                ]
//            ],
//            ['label' => 'Фурнитура', 'url' => 'category/10'],
//            ['label' => 'Апельсины', 'url' => 'category/12'],
//        ],
//    ]);



    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

<!--        <p class="pull-left">--><?//= Yii::powered() ?><!--</p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
