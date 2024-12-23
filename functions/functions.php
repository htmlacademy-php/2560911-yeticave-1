<?php
/**
 * Подключает шаблон, передает туда данные и возвращает итоговый HTML контент
 * @param string $name Путь к файлу шаблона относительно папки templates
 * @param array $data Ассоциативный массив с данными для шаблона
 * @return string Итоговый HTML
 */
function includeTemplate($name, array $data = []) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

/**
 *@param string $data
 *@return int
 */
function remainingTime(string $date) {
    $timeDifference = strtotime($date) - time();
    if ($timeDifference<=0){
        return [0,0];

    }
    $hours = floor($timeDifference / 3600);
    $minutes = floor(($timeDifference / 3600) % 60);

    return [$hours, $minutes];
}

/**
 * Форматирует cумму лота и добавляет знак рубля
 * @param int|float $price
 * @return string
 */
function formatAmount(int|float $price): string
{
    $price = number_format($price, 0, '.', ' ');
    return $price . ' ₽';
}