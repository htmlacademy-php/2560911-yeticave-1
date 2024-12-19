<?php 
require_once ('templates/data.php');
require_once ('helpers.php');

$mainContent = include_template('main.php', [
    'categories' => $categories,
    'lots' => $lots,
]);

$layoutContent = include_template('layout.php', [
    'content' => $mainContent,
    'title' => "Главная",
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'categories' => $categories,
]);

print($layoutContent);
