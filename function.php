<?php

// ini_set("memory_limit","4096M");
// ini_set("upload_max_filesize","4096M");
// ini_set("post_max_size","4096M");
// my.ini (max_allowed_packet=-1) 38L

//ユーザ定義関数

function h($s){
    return htmlspecialchars($s, ENT_QUOTES, 'utf-8');//ユーザーの入力内容の制限
}

function t($trim){
    return preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $trim);
}

/*
* CSRF トークン作成
*/
function get_csrf_token()
{
    $TOKEN_LENGTH = 16; //16*2=32byte
    $bytes = openssl_random_pseudo_bytes($TOKEN_LENGTH);
    return bin2hex($bytes);
}
/* PDO の接続オプション取得 */
function get_pdo_options()
{
    return array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
        PDO::ATTR_EMULATE_PREPARES => false
    );
}

/* 掲示板へのリダイレクト */
function redirect($topic_id)
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: bord.php?topic_id=$topic_id");
}

/* 掲示板へのリダイレクト */
function redirect_topic($kind)
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: topic.php?kind=$kind");
}

/* トップ画面へのリダイレクト */
function redirect_top()
{
    header("HTTP/1.1 302 Moved Permanently");
    header("Location: index.php");
}
?>