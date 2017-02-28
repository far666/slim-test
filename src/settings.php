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
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        // @TODO: 拉到另一個file去分辨 正式機跟測試機
        'db' => [
            'host' => 'localhost',
            'user' => 'social',
            'pass' => 'abc123',
            'dbname' => 'social',
        ]
    ],
];
