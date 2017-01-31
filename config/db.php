<?php

$mysql_host = empty($_ENV['MYSQL_HOST']) ? 'localhost':$_ENV['MYSQL_HOST'];
$mysql_db = empty($_ENV['MYSQL_DB']) ? 'citygram':$_ENV['MYSQL_DB'];
$mysql_user = empty($_ENV['MYSQL_USER']) ? 'root':$_ENV['MYSQL_USER'];
$mysql_pw = empty($_ENV['MYSQL_PW']) ? '':$_ENV['MYSQL_PW'];

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='. $mysql_host .';dbname='. $mysql_db,
    'username' => $mysql_user,
    'password' => $mysql_pw,
    'charset' => 'utf8',
];
