<?php

$app->get('/service/{ini}/{fin}', function ( $request, $response, $args) {

    $data = file_get_contents("employees.json");
    $employees = json_decode($data, true);
    $employeesFound = array();
    $ini = (double)$args['ini'];
    $fin = (double)$args['fin'];

    foreach ($employees as $person) {

        $salary = (double) filter_var($person['salary'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if ($ini<= $salary && $salary <= $fin ) {
            $employeesFound[] = $person;
        } 
    }

    $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
    array_to_xml($employeesFound, $xml_data);

    $response->withHeader('Content-Type', 'application/xml');
    $response->getBody()->write($xml_data->asXML());
    return $response;
});


