<?php
if(in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
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