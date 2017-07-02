<?php
// Routes
$app->get('/', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    $path = $_GET['path'] ?? '';
    $files = scandir($this->get('settings')['ftp']['local_folder'] . (($path !== '') ? '/' . trim($path, '/') : ''));

    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', ['tpl' => './browser/list.phtml', 'files' => $files]);
});
