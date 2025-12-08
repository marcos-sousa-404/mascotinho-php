<?php
$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');
$request = rtrim($request, '/');

$routes = [
    '' => 'index.html',
    '/' => 'index.html',
    '/adopt' => 'adopt.html',
    '/donate' => 'donate.html',
    '/contact-us' => 'contact-us.html',
];

if (array_key_exists($request, $routes)) {
    $file = $routes[$request];

    if (file_exists($file)) {
        header('Content-Type: text/html; charset=utf-8');
        readfile($file);
        exit;
    }
}

http_response_code(404);
echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página não encontrada</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>404 - Página não encontrada</h1>
    <p><a href="/">Voltar para a página inicial</a></p>
</body>
</html>';
