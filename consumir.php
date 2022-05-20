<?php

declare(strict_types = 1);

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$method = $_SERVER['argv'][1];

$client = new Client([
    'base_uri' => 'http://apis_e_php'
]);

switch ($method) {
    case 'GET':
        $response = $client->request(
            'GET', 
            'produto', 
            [
                'headers' => [
                    'x-id' => 2
                ]
            ]
        );
    break;
    case 'POST':
        $response = $client->request(
            'POST', 
            'produto', 
            [
                'json' => [
                    'nome' => 'Banana',
                    'preco' => 0.3
                ]
            ]
        );
    break;

    case 'PATCH':
        $response = $client->request(
            'PATCH', 
            'produto', 
            [
                'headers' => [
                    'x-id' => 3
                ],
                'json' => [
                    'nome' => 'Banana nanica',
                    'preco' => 0.33
                ]
            ]
        );
    break;

    case 'DELETE':
        $response = $client->request(
            'DELETE', 
            'produto', 
            [
                'headers' => [
                    'x-id' => 3
                ]
            ]
        );
    break;
}

echo $response->getBody() . PHP_EOL;
