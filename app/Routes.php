<?php

return
[
   // авторизация
  'login' =>
   [
      'url' => [
        'login' =>[
          'controller'      => 'access',
          'action'          => 'login',
          'title'           => 'Авторизация',
          'icon'            => 'icon-home',
          'priority_action' => ture,
          'has_sidebar'     => ture,
          'parent'          => false
        ],
        'access/loginout' =>[
          'controller'      => 'access',
          'action'          => 'loginout',
          'title'           => 'Выход',
          'icon'            => 'icon-home',
          'priority_action' => ture,
          'has_sidebar'     => ture,
          'parent'          => false
        ],
      ],
      [
        'title'         => 'Авторизация',
        'icon_categiry' => 'icon-home'
      ],
      'authorization' => false
   ],
   'home' =>
   [
      'url' => [
        'home/index' =>[
          'controller'      => 'home',
          'action'          => 'index',
          'title'           => 'Главная страница',
          'icon'            => 'icon-home',
          'priority_action' => ture,
          'has_sidebar'     => ture,
          'parent'          => false
        ],
      ],
      'category' =>
      [
        'title'         => 'Главная',
        'name_category' => 'home',
        'icon_categiry' => 'icon-home'
      ],
      'authorization' => true
   ],
   //expedition
   'technics' =>
   [
      'url' => [
        'technics/index' =>[
          'controller'      => 'technics',
          'action'          => 'index',
          'title'           => 'Работа с техникой',
          'icon'            => 'icon-truck',
          'priority_action' => ture,
          'parent'          => true,
          'child'          => [
            'technics/management' =>[
              'controller'      => 'technics',
              'action'          => 'management',
              'title'           => 'Работа с данными',
              'icon'            => 'icon-graph',
              'priority_action' => false,
            ],
            'technics/reports' =>[
              'controller'      => 'technics',
              'action'          => 'reports',
              'title'           => 'Отчеты',
              'icon'            => 'icon-download4',
              'priority_action' => false,
            ],
          ],
        ],
        'technics/counterparty' =>[
          'controller'      => 'technics',
          'action'          => 'counterparty',
          'title'           => 'Контрагенты',
          'icon'            => 'icon-briefcase3',
          'priority_action' => false,
          'parent'          => false,
        ],
        'technics/event' =>[
          'controller'      => 'technics',
          'action'          => 'event',
          'title'           => 'Событие',
          'icon'            => 'icon-download4',
          'priority_action' => false,
          'parent'          => false,
          'in_menu'         => false,
        ],
      ],
      'category' =>
      [
        'title'         => 'Техника',
        'name_category' => 'technics',
        'icon_categiry' => 'icon-truck'
      ],
      'authorization' => true
   ],
   //administration
   'administration' =>
   [
      'url' => [
        'administration/index' =>[
          'controller'      => 'administration',
          'action'          => 'index',
          'title'           => 'Управление',
          'icon'            => 'icon-cog',
          'priority_action' => ture,
          'parent'          => true,
          'child'          => [
            'administration/management' =>[
              'controller'      => 'administration',
              'action'          => 'management',
              'title'           => 'Управление структурой',
              'icon'            => 'icon-cogs',
              'priority_action' => false,
            ],
          ],
        ],
        'administration/access' =>[
          'controller'      => 'administration',
          'action'          => 'access',
          'title'           => 'Управление доступами',
          'icon'            => 'icon-user-tie',
          'priority_action' => false,
          'parent'          => false,
        ],
        'administration/users' =>[
          'controller'      => 'administration',
          'action'          => 'users',
          'title'           => 'Управление пользователями',
          'icon'            => 'icon-user',
          'priority_action' => false,
          'parent'          => false,
        ],
      ],
      'category' =>
      [
        'title'         => 'Администрирование',
        'name_category' => 'administration',
        'icon_categiry' => 'icon-cogs'
      ],
      'authorization' => true
   ],
];
