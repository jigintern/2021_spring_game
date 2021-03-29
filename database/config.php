<?php
ini_set('display_errors', 1); //エラー表示
//0で非表示、1で表示
//定数定義 define("定数名","中身");
define('DSN', 'mysql:host=localhost;dbname=game;charset=utf8mb4;');
define('DB_USER', 'root');
define('DB_PASS', '');
define('ARY', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // エラー発生時は例外をスローする
));
define("LOGIN_FAILED_LIMIT", 5); // 上限回数
define("LOGIN_LOCK_PERIOD", 30); // 秒
