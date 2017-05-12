<?php

// Routes

$app->get('/', function ($request, $response, $args) {
    $data = file_get_contents("employees.json");
    $products = json_decode($data, true);
    $args['data']= $products;
    return $this->renderer->render($response, 'home.phtml', $args);
});
