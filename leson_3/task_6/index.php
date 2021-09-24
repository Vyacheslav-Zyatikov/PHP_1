<?php
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');


$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = [];

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        break;

    case 'catalogssr':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog()['catalog'];
        break;

    case 'catalogspa':
        $params['title'] = 'Каталог spa';
        break;

    case 'about':
        $params['title'] = 'about';
        $params['phone'] = 444333;
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

echo render($page, $params);


function getCatalog()
{
    return [
        'catalog' => [
            [
                'name' => 'Пицца',
                'price' => 24
            ],
            [
                'name' => 'Чай',
                'price' => 1
            ],
            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ]
    ];

}

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
            'title' => $params['title'],
            'menu' => renderTemplate('menu', $params),
            'content' => renderTemplate($page, $params)
        ]
    );
}

//$params = ['menu' => 'код меню', 'catalog' => ['чай'], 'content' => 'Код подшаблона']
function renderTemplate($page, $params = [])
{
    /*    foreach ($params as $key => $value) {
            $$key = $value;
        }*/

    extract($params);

    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}
/*
$menuArr = [
    '/' => 'Главная',
    '/?page=catalogspa' => 'Каталог spa' ,
    '/?page=catalogssr' => 'Каталог ssr' ,
    '/?page=about' => 'О нас' ,
];

function menuRender($arr)
{

    if (!is_array($arr)) {
        return 'incorrect argument';
    }

    $renderArr[] = '<ul>';
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $renderArr[] = '<li>' . $key . menuRender($value) . '</li>';
        } else {
            $renderArr[] = "<li><a href=\"<?={$key}?>\"><?={$value}?></a></li>";
        }
    }
    $renderArr[] = '</ul>';

    return implode($renderArr);
}
*/