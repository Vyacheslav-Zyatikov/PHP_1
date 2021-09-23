<?php

$about = renderTemplate('about', '(495) 777-22-33');
$menu = renderTemplate('menu');
$footer = renderTemplate('footer');

echo renderTemplate('layout', $about, $menu, $footer);

function renderTemplate($page, $content = '', $menu = '', $footer = '')
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}
