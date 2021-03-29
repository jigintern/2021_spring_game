<?php

require_once('config.php');
$pdo = new PDO(DSN, DB_USER, DB_PASS);

//userdata
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("create table if not exists userdata(
        id int not null auto_increment,
        email varchar(255) not null,
        name varchar(255) character set utf8 collate utf8_general_ci not null,
        password varchar(255) not null,
        failed_count int not null default 0,
        locked_time datetime,
        verify int not null default 0,
        verify_team int not null default 0,
        created timestamp not null default current_timestamp,
        primary key(id),
        unique key(email)
      )");
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}