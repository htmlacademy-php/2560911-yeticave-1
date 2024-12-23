<?php
require_once ('templates/data.php');
require_once ('helpers.php');

$mainContent = includeTemplate('main.php', [
    'categories' => $categories,
    'lots' => $lots,
]);

$layoutContent = includeTemplate('layout.php', [
    'content' => $mainContent,
    'title' => "Главная",
    'isAuth' => $isAuth,
    'userName' => $userName,
    'categories' => $categories,
]);

print($layoutContent);
