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
    ''            => 'src/index.php',
    '/'           => 'src/index.php',
    '/adopt'      => 'src/adopt.php',
    '/donate'     => 'src/donate.php',
    '/contact-us' => 'src/contact-us.php',
];

if (array_key_exists($request, $routes)) {
    $file = __DIR__ . '/' . $routes[$request];

    if (file_exists($file)) {
        require $file;
        exit;
    }
}

http_response_code(404);
echo "<h1>404 - Página não encontrada</h1>";
echo "<p>A rota '$request' não existe.</p>";