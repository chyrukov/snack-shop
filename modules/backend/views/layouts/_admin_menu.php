<?= dmstr\widgets\Menu::widget(
        [
            'options' => ['class' => 'sidebar-menu'],
            'items' => [
                ['label' => 'Страницы', 'icon' => 'file-code-o', 'url' => ['./pages']],
                ['label' => 'Информеры', 'icon' => 'fa fa-info', 'url' => ['./info']],
                ['label' => 'Персонал', 'icon' => 'fa fa-people', 'url' => ['./personal']],
                //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                [
                    'label' => 'Same tools',
                    'icon' => 'share',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                        ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                        [
                            'label' => 'Level One',
                            'icon' => 'circle-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                [
                                    'label' => 'Level Two',
                                    'icon' => 'circle-o',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]
    ) ?>

