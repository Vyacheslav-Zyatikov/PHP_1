<?php

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params['layout'] = 'main';

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        break;

    case 'bux':
        // $params['layout'] = 'bux';

        if (!empty($_FILES)) {
            upload($_SERVER['DOCUMENT_ROOT'] . '/docs/');
            header("Location: /?page=bux");
        }

       // $params['message'] = '';
        $params['title'] = 'Бухи';
        $params['files'] = getFiles( $_SERVER['DOCUMENT_ROOT'] . '/docs/');
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
        $params['phone'] = '4957777777';
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();

    case 'gallery':
        $params['layout'] = 'gallery';
        $params['title'] = 'Галерея';
        $params['images'] = getGallery(IMG_SMALL);

        if (!empty($_FILES)) {
            uploadImage();
        }

        break;
}
//_log($params, 'params');
echo render($page, $params);

