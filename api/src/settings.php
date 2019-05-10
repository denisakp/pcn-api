<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        //db
        'db' => [
            'host' => 'localhost',
            'dbname' => 'conso_db',
            'user' => 'denakp',
            'passwd' => 'admin1234',
        ],

        //jwt
        'jwt' => [
            'secret' => '73BB778C4011AD40DAE01737E202D6E82211CEB78A677F9FD7E52774B4EB0CA7',
        ],
    ],
];
