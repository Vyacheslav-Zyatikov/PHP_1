<?php
define("ROOT", dirname(__DIR__));
define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');
define("IMG_SMALL", "gallery_img/small/"); // При использовании абсолютного пути браузер запрещает загрузку
define("IMG_BIG", "gallery_img/big/"); // При использовании абсолютного пути браузер запрещает загрузку


//TODO попробуйте сделать эти пути абсолютными
include ROOT . "/engine/SimpleImage.php";
include ROOT . "/engine/functions.php";
include ROOT . "/engine/catalog.php";
include ROOT . "/engine/log.php";
include ROOT . "/engine/files.php";
include ROOT . "/engine/menu.php";
include ROOT . "/engine/gallery.php";
include ROOT . "/engine/upload.php";
