<?php

return [
    "database" => parse_ini_file("db_settings.ini"),
    "twig" => [
        "cache" => __DIR__ . '/../cache',
        "templates" => __DIR__ . '/../templates'
    ]
];
