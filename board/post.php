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
        redirect();
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
    /*
    $type = $_FILES["image"]["type"];
    $content = file_get_contents($_FILES["image"]["tmp_name"]);
    $size = $_FILES["image"]["size"];
    */
    try{
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $sql="insert into topic(kind, topic) value(:kind, :topic)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':kind', $kind, PDO::PARAM_STR);
        $stmt->bindValue(':topic', $topic, PDO::PARAM_STR);
        /*
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_LOB);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        */
        $stmt->execute();
        redirect_topic($kind);
    } catch (\Exception $e) {
        return FALSE;
    }
} else {
    /* 例外処理 */
    redirect_top();
}
