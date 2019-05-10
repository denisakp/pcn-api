<?php

use Slim\App;

return function (App $app) {

    $app->add(new \Tuupola\Middleware\JwtAuthentication([
        'path' => '/api',
        'attribute' => 'jwt',
        'secret' => '73BB778C4011AD40DAE01737E202D6E82211CEB78A677F9FD7E52774B4EB0CA7',
        'algorithm' => ['HS256'],
        'error' => function($request, $response, $arguments){
            $data['status'] = 'error';
            $data['message'] = $arguments['message'];
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        }
    ]));
};
