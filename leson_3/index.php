<?php
/*
1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
*/
echo "Задание 1 <br><br>";
$number = 0;
while ($number <= 100) {
    if ($number % 3 === 0 && $number !== 0) {
        echo $number . "<br>";
    }
    $number++;
}
echo '<hr>';
/*
2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
    0 – ноль.
    1 – нечетное число.
    2 – четное число.
    3 – нечетное число.
    …
    10 – четное число.
*/
echo "<br> Задание 2 <br><br>";

$number = 0;
do {
    if ($number === 0) {
        echo $number . ' – это ноль.' . '<br>';
    } elseif ($number % 2 !== 0) {
        echo $number . ' – нечетное число.' . '<br>';
    } else {
        echo $number . ' – четное число.' . '<br>';
    }
    $number++;
} while ($number < 11);

echo '<hr>';
/*
3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений
– массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:

    Московская область:
    Москва, Зеленоград, Клин.
Ленинградская область:
    Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
Рязанская область … (названия городов можно найти на maps.yandex.ru) строго соблюдать формат вывода выше,
т.е. двоеточие и точка в конце
*/
echo "<br> Задание 3 <br><br>";

$areaArr = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Сасово', 'Скопин', 'Кораблино']
];

function displayCity($arr)
{
    if (!is_array($arr)) {
        return print "Массив '{$arr}' некорректный ";
    }
    foreach ($arr as $key => $value) {
        echo "{$key}:<br>";
        foreach ($value as $i => $city) {
            $arrLength = count($value);
            if ($i === $arrLength - 1) {
                echo $city . '.' . '<br>';
            } else {
                echo $city . ', ';
            }
        }
    }
}

displayCity($areaArr);

echo '<hr>';

/*
4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские
буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк. Она должна учитывать и заглавные буквы.
*/
echo "<br> Задание 4 <br><br>";

function translit($string)
{
    if (!is_string($string)) {
        return 'incorrect argument';
    }

    $ruChars = 'А	Б	В	Г	Д	Е	Ё	Ж	З	И	Й	К	Л	М	Н	О	П	Р	С	Т	У	Ф	Х	Ц	Ч	Ш	Щ	Ъ	Ы	Ь	Э	Ю	Я';
    $enChars = 'A	B	V	G	D	E	E	ZH	Z	I	Y	K	L	M	N	O	P	R	S	T	U	F	KH	TS	CH	SH	SCH	’ 	Y	’ 	E	YU	YA';

    //совмещенный массив
    $tranArrLow = array_combine(explode('	', mb_strtolower($ruChars, 'UTF-8')), explode('	', strtolower($enChars)));
    $tranArrUpper = array_combine(explode('	', mb_strtoupper($ruChars, 'UTF-8')), explode('	', strtoupper($enChars)));
    $tranArr = array_merge($tranArrLow, $tranArrUpper);
    //преобразуем аргумент (строку) в массив
    $stringArr = preg_split('//u', $string, 0, PREG_SPLIT_NO_EMPTY);

    $requestedArr = [];

    //перебираем строку и для каждой буквы ищем совпадение в массиве транслита
    for ($i = 0; $i < count($stringArr); $i++) {
        foreach ($tranArr as $key => $value) {
            //если находим, добавляем в новый массив
            if ($stringArr[$i] == $key) {
                array_push($requestedArr, $value);
                break;
                //если встречаются знаки пунктуации или пробелы, добавляем без обработки
            } elseif (preg_match('/[[:punct:]]|\s/', $stringArr[$i])) {
                array_push($requestedArr, $stringArr[$i]);
                break;
            }
        }
    }

    //выводим на экран
    return implode($requestedArr);
}

echo translit('Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания');

echo '<hr>';

/*
5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
Можно через str_replace
*/
echo "<br> Задание 5 <br><br>";

function replaceSpace($string)
{
    if (!is_string($string)) {
        return "incorrect argument {$string}";
    }

    return preg_replace('/\s/', '_', $string);
}

echo replaceSpace('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.');

echo '<hr>';
/*
6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.
Необходимо представить пункты меню как элементы массива и вывести их циклом.
Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
Важное, при желании можно сделать на движке 3. ВАЖНОЕ!
*/
echo "<br> Задание 6 <br><br>";

$menuArr = [
    'Главная',
    'Каталог spa' ,
    'Каталог ssr' ,
    'О нас' ,
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
            $renderArr[] = '<li>' . $value . '</li>';
        }
    }
    $renderArr[] = '</ul>';

    return implode($renderArr);
}

echo menuRender($menuArr);

echo '<hr>';

/*
7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
for (…){ // здесь пусто}
*/
echo "<br> Задание 7 <br><br>";

for ($i = 0; $i < 10; print $i++ . ' ') {
};

echo '<hr>';

/*8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».*/
echo "<br> Задание 8 <br>";

$areaArr = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Сасово', 'Скопин', 'Кораблино']
];

function filterDisplayCity($arr, $filterKey)
{
    if (!is_array($arr)) {
        return print "Массив '{$arr}' некорректный ";
    }
    foreach ($arr as $key => $value) {
        echo "<br>{$key}:<br>";
        $echoCount = 0;
        foreach ($value as $i => $city) {
            $arrLength = count($value);
            $explodeArr = preg_split('//u', $city, 0, PREG_SPLIT_NO_EMPTY);
            if (($explodeArr['0'] !== $filterKey) && ($echoCount == 0) && ($i === $arrLength - 1) && !empty($filterKey)) {
                echo "В этой области городов согласно фильтру '{$filterKey}' нет.";
            } elseif (($i == $arrLength - 1) && ($echoCount !== 0) && ($explodeArr['0'] == $filterKey)) {
                echo ", {$city}.";
            } elseif (($i == $arrLength - 1) && ($echoCount !== 0)) {
                echo ".";
            }elseif (($explodeArr['0'] !== $filterKey) && !empty($filterKey)) {
                continue;
            }  else {
                if (($echoCount == 0) && ($i === $arrLength - 1)) {
                    echo "{$city}.";
                } elseif (($echoCount !== 0) && ($i !== $arrLength - 1)) {
                    echo ", {$city}";
                } else {
                    echo "{$city}";
                    $echoCount++;
                }
            }
        }
    }
}

filterDisplayCity($areaArr, "К");

echo '<hr>';

/* 9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при
конструировании url-адресов на основе названия статьи в блогах).
*/
echo "<br> Задание 9 <br><br>";
// Дабы не дублировать код вызываю одну функцию из другой
function urlTranslate($string){
    return replaceSpace(translit($string));
}

echo urlTranslate('статьи по кулинарии/курочка в чесночном соусе');

echo '<hr>';
