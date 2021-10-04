<?php


function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . $params['layout'], [
            'title' => $params['title'],
            'menu' => renderTemplate('menu', menuRender(getMenu()['menu'])),
            'content' => renderTemplate($page, $params)
        ]
    );
}


//$params = ['menu' => 'код меню', 'catalog' => ['чай'], 'content' => 'Код подшаблона']
function renderTemplate($page, $params = [])
{
    /*  foreach ($params as $key => $value) {
            $$key = $value;
        }
*/
    extract($params);

    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}

function menuRender($arr)
{
    $renderArr[] = '<ul>';
    foreach ($arr as $key => $item) {
        if (array_key_exists('submenu', $item)) {
            $renderArr[] = "<li><a href=" . $item["href"] . ">" . $item["name"] . "</a></li>" . implode(menuRender($item['submenu']));
        } else {
            $renderArr[] = "<li><a href=" . $item["href"] . ">" . $item["name"] . "</a></li>";
        }
    }
    $renderArr[] = '</ul>';

    return $renderArr;
}