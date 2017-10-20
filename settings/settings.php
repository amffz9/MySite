<?php

return [
    "database" => parse_ini_file("db_settings.ini"),
    "twig" => [
        "debug" => true,
        /*"cache" => __DIR__ . '/../cache',*/
        "templates" => __DIR__ . '/../templates'
    ]
];
