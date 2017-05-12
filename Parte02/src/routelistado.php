<?php

$app->post('/listado', function ($request, $response, $args) {
    // Sample log message
    $post = $request->getParsedBody();
    $data = file_get_contents("employees.json");
    $employees = json_decode($data, true);
    $employeesFound = array();

    $search = (isset($post['email'])) ? $post['email'] : '';

    foreach ($employees as $person) {

        if ($search == '') {
            $employeesFound[] = array(
                'id' => $person['id'],
                'name' => $person['name'],
                'email' => $person['email'],
                'position' => $person['position'],
                'salary' => $person['salary'],
            );
        } elseif ($search  == $person['email'] ){
            $employeesFound[] = array(
                'id' => $person['id'],
                'name' => $person['name'],
                'email' => $person['email'],
                'position' => $person['position'],
                'salary' => $person['salary'],
            );
        }
    }
    $args['data'] = $employeesFound;
    return $this->renderer->render($response, 'listado.phtml', $args);
});


