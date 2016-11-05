<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 18.10.2016
 * Time: 12:19
 */
return [
    'language' => 'en-US',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlite:' . dirname(__DIR__) . '/data/test.db',
            'username' => 'sitnikov',
            'password' => '12345',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];