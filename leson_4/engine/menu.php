<?php

function getMenu()
{
    return [
        'menu' => [
            [
                'href' => '/',
                'name' => 'Главная'
            ],
            [
                'href' => '/?page=catalogspa',
                'name' => 'Каталог spa',
              /*  'submenu' => [ // Пример построения подменю
                    [
                        'href' => '/#',
                        'name' => 'Меню11111'
                    ],
                    [
                        'href' => '/#',
                        'name' => 'Меню22222'
                    ],
                    [
                        'href' => '/#',
                        'name' => 'Меню3333'
                    ],
                ],*/
            ],
            [
                'href' => '/?page=catalogssr',
                'name' => 'Каталог ssr'
            ],
            [
                'href' => '/?page=about',
                'name' => 'О нас'
            ],
            [
                'href' => '/?page=bux',
                'name' => 'Бухгалтерия'
            ],
            [
                'href' => '/?page=gallery',
                'name' => 'Галерея'
            ],
        ]
    ];
}