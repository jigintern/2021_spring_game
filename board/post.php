<?php
require("../function.php");
require("../database/config.php");
if ($_POST["class"] == "bord") {
    /* 掲示板投稿用 */
    $comment = h(t($_POST["comment"]));

    if (!isset($_SESSION)) {
        session_start();
    }

    // トピックid
    $topic_id = $_SESSION["topic_id"];

    // リプライ先id 無ければ0
    $lip = 0;

    if (!$comment) {
        redirect($topic_id);
    }

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $sql = "insert into board(topic_id, comment, lip) value(?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$topic_id, $comment, $lip]);
        redirect($topic_id);
    } catch (\Exception $e) {
        return FALSE;
    }
} elseif($_POST["class"] == "topic") {
    /* トピック投稿用 */
    $kind = $_POST["kind"];
    $topic = $_POST["topic"];
    $name = uniqid().pathinfo($_FILES["image"]["name"])["extension"];
    $image_path = "../img/topic";
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path.$name);
    try{
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $sql="insert into topic(kind, topic, image_path) value(:kind, :topic, :image_path)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':kind', $kind, PDO::PARAM_STR);
        $stmt->bindValue(':topic', $topic, PDO::PARAM_STR);
        $stmt->bindValue(':image_path', $image_path.$name, PDO::PARAM_STR);
        $stmt->execute();
        redirect_topic($kind);
    } catch (\Exception $e) {
        return FALSE;
    }
} elseif($_POST["class"] == "edit") {
    $url = $_POST["url"];
    $contents = $_POST["contents"];

    try{
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $sql="insert into edit(url, contents) value(?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$url, $contents]);
        redirect_page($url);
    } catch (\Exception $e) {
        return FALSE;
    }
} else {
    /* 例外処理 */
    redirect_top();
}
