<?php

return [
    'class' => 'panix\engine\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4', //utf8 на utf8mb4. FOR Emoji
    'tablePrefix' => 'cms_',
    'serverStatusCache' => YII_DEBUG ? 0 : 3600,
    'schemaCacheDuration' => YII_DEBUG ? 0 : 3600 * 24,
    'enableSchemaCache' => true,
    'schemaCache' => 'cache',
    //'on afterOpen' => function($event) {
    //$event->sender->createCommand("SET time_zone = '" . date('P') . "'")->execute();
    //$event->sender->createCommand("SET names utf8")->execute();
    //},
];
