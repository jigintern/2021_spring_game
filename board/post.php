<?php
require("../function.php");
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

    require("../database/config.php");

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $sql = "insert into board(topic_id, comment, lip) value(?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$topic_id, $comment, $lip]);
        redirect();
    } catch (\Exception $e) {
        return FALSE;
    }
} elseif($_POST["class"] == "topic") {
    /* トピック投稿用 */
    $topic = 0;
} else {
    /* 例外処理 */
    redirect_top();
}
