<?php
$title = "Главная страница - страница обо мне";
$head1 = "Информация обо мне";
$year = 2021;

$content = file_get_contents("template.tpl");

$content = str_replace("{{ title }}", $title, $content);
$content = str_replace("{{ head1 }}", $head1, $content);
$content = str_replace("{{ year }}", $year, $content);

echo $content;