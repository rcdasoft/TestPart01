<?php

// Routes

$app->get('/employee/{id}', function ($request, $response, $args) {
    $data = file_get_contents("employees.json");
    $employees = json_decode($data, true);
    $employee = array();
    
    foreach ($employees as $person) {

        if ($args['id'] == $person['id']) {
            $employee = $person;
            break;
        }
        
    }
    $args['data'] = $employee;
    return $this->renderer->render($response, 'employee.phtml', $args);
});
