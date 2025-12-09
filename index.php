<?php
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = rtrim($request, '/');

$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

if ($basePath !== '' && $basePath !== '/' && strpos($request, $basePath) === 0) {
    $request = substr($request, strlen($basePath));
}

if ($request === '' || $request === false) {
    $request = '/';
}

$routes = [
    ''            => 'src/index.html',
    '/'           => 'src/index.html',
    '/adopt'      => 'src/adopt.html',
    '/donate'     => 'src/donate.html',
    '/contact-us' => 'src/contact-us.html',
];

if (array_key_exists($request, $routes)) {
    $file = __DIR__ . '/' . $routes[$request];

    if (file_exists($file)) {
        header('Content-Type: text/html; charset=utf-8');
        readfile($file);
        exit;
    }
}

http_response_code(404);

$baseUrl = ($basePath === '/' ? '' : $basePath);

echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página não encontrada</title>
    <link rel="stylesheet" href="' . htmlspecialchars($baseUrl, ENT_QUOTES) . '/src/styles.css">
</head>
<body>
    <h1>404 - Página não encontrada</h1>
    <p><a href="' . htmlspecialchars($baseUrl, ENT_QUOTES) . '">Voltar para a página inicial</a></p>
</body>
</html>';
