<?php
/*1.
Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
Затем написать скрипт, который работает по следующему принципу:
    если $a и $b положительные, вывести а и б положительные;
    если $а и $b отрицательные, вывести а и б отрицательные;
    если $а и $b разных знаков, вывести а и б разных знаков;
Ноль можно считать положительным числом.
*/
$a = rand(-100, 100);
$b = rand(-100, 100);
echo "Задание 1 <br><br>";
echo "a = {$a} b = {$b}<br>";

if ($a >= 0 && $b >= 0) {
    echo "а и б положительные <br>";
} elseif ($a < 0 && $b < 0) {
    echo "а и б отрицательные <br>";
} else {
    echo "а и б разных знаков <br>";
}

/*
2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.
 При желании сделайте это задание через рекурсию.
*/
$b = 15; // задаём конечную цифру
$a = rand(0, $b); // генерируем случайное число от 0 до конца диапазона $b.
echo "<br>Задание 2 <br><br>";
echo "a = " . $a . " - функция рекурсии<br>";

function recursion($a, $b)
{
    echo $a . "<br>";
    if ($a < $b) {
        $a++;
        recursion($a, $b);
    }
}

recursion($a, $b);

$a = rand(0, 15); // генерируем случайное число от 0 до конца диапазона 15.
echo "a = " . $a . " - через switch<br>";

switch ($a) {
    case 0:
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
    case 6:
    case 7:
    case 8:
    case 9:
    case 10:
    case 11:
    case 12:
    case 13:
    case 14:
    case 15:
        echo "{$a} <br>";
        break;
    default:
        echo "Упс, что-то пошло не так.";
}

/*
3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
Обязательно использовать оператор return. В делении проверьте деление на 0 и верните текст ошибки.
*/
$a = rand(0, 100);
$b = rand(0, 100);
echo "<br>Задание 3 <br><br>";
echo "a = " . $a . " b = " . $b . "<br>";

function sum($a, $b)
{
    return $a + $b;
}

function minus($a, $b)
{
    return $a - $b;
}

function mul($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
    if ($b !== 0) {
        return $a / $b;
    } else {
        return "Делить на ноль нельзя";
    }
}

echo "<br>" . sum($a, $b) . " - сумма";
echo "<br>" . minus($a, $b) . " - вычитание";
echo "<br>" . mul($a, $b) . " - умножение";
echo "<br>" . div($a, $b) . " - деление";

/*
4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
В зависимости от переданного значения операции выполнить одну из арифметических операций
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
*/
echo "<br>Задание 4 <br><br>";
function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "+":
            return sum($arg1, $arg2);
        case "-":
            return minus($arg1, $arg2);
        case "*":
            return mul($arg1, $arg2);
        case "/":
            return div($arg1, $arg2);
        default:
            return "Операция не определена, уточните ввод";
    }
}

echo "<br>" . mathOperation($a, $b, "+");

/*
5. Собрать страницу с меню и контентом, зарендерить как минимум 2 подшаблона через renderTemplate. ВАЖНОЕ
*/

// В отдельной папке task_5

/*
6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow),
где $val – заданное число, $pow – степень.
*/
function power($val, $pow)
{
    if ($pow === 0) {
        return 1;
    }
    elseif ($pow < 0) {
        if ($val === 0) {
            return "Ошибка";
        }
        return 1 / ($val * power($val, -$pow - 1));
    }
    return $val * power($val, $pow - 1);
}

echo "<br>Задание 6 <br><br>";

echo "<br> Возведение в степень " . power(2, 8);
echo "<br> Возведение в отрицательную степень " . power(2, -8);

/*
7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты
*/
echo "<br>Задание 7 <br><br>";

function dateWord(): string
{
    $today = getdate();
    $hWord = "";
    $mWord = "";
    if ($today["hours"] >= 10 && $today["hours"] >= 19) {
        $hWord = "часов";
    }
    if ($today["minutes"] >= 10 && $today["minutes"] >= 19) {
        $hWord = "минут";
    }
    switch ($today["hours"] % 10) {
        case 1:
            $hWord = "час";
            break;
        case 2:
        case 3:
        case 4:
            $hWord = "часа";
            break;
        default:
            $hWord = "часов";
    }
    switch ($today["minutes"] % 10) {
        case 1:
            $mWord = "минута";
            break;
        case 2:
        case 3:
        case 4:
            $mWord = "минуты";
            break;
        default:
            $mWord = "минут";
    }
    return "{$today['hours']} {$hWord} {$today['minutes']} {$mWord}";
}

echo "<br>" . dateWord();