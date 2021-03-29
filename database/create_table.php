<?php

require_once('config.php');
$pdo = new PDO(DSN, DB_USER, DB_PASS);

//board
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("create table if not exists topic(
        id int not null auto_increment,
        kind varchar(255) character set utf8 collate utf8_general_ci not null,
        topic varchar(255) character set utf8 collate utf8_general_ci not null,
        image_type varchar(255) not null,
        image_content longblob not null,
        image_size int not null,
        created timestamp not null default current_timestamp,
        primary key(id)
      )");
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

//board
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("create table if not exists board(
        id int not null auto_increment,
        topic_id int not null,
        comment varchar(255) character set utf8 collate utf8_general_ci not null,
        lip int,
        created timestamp not null default current_timestamp,
        primary key(id)
      )");
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}