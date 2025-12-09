<?php
// Pega a URL que o usuário está acessando
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = rtrim($request, '/');

// Calcula o caminho base do projeto
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

// Ajusta a requisição removendo o caminho base
if ($basePath !== '' && $basePath !== '/' && strpos($request, $basePath) === 0) {
    $request = substr($request, strlen($basePath));
}

if ($request === '' || $request === false) {
    $request = '/';
}

// LISTA DE ROTAS ATUALIZADA (Apontando para os novos arquivos .php)
$routes = [
    ''            => 'src/index.php',
    '/'           => 'src/index.php',
    '/adopt'      => 'src/adopt.php',
    '/donate'     => 'src/donate.php',
    '/contact-us' => 'src/contact-us.php',
];

// Roteamento
if (array_key_exists($request, $routes)) {
    $file = __DIR__ . '/' . $routes[$request];

    if (file_exists($file)) {
        require $file;
        exit;
    }
}

// Página 404 simples
http_response_code(404);
echo "<h1>404 - Página não encontrada</h1>";
echo "<p>A rota '$request' não existe.</p>";