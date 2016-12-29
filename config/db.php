<?php
if(file_exists(__DIR__ . '/../local')) {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=stickerdecor',
        'username' => 'stickerdecor',
        'password' => '12345',
        'charset' => 'utf8',
        'tablePrefix' => 'mw_'
    ];
}
else {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=sitnikova.mysql;dbname=sitnikova_mw',
        'username' => 'sitnikova_mysql',
        'password' => '7rtqzj1t',
        'charset' => 'utf8',
        'tablePrefix' => 'mw_'
    ];
}