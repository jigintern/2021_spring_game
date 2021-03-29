<?php
require("../database/config.php");
if (!isset($_SESSION)) {
    session_start();
}
// トピックid
$topic_id = 0;
$_SESSION["topic_id"] = $topic_id;

// DBセレクト
try{
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $sql = "select id, comment, created from board where topic_id=? order by created desc";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$topic_id]);
    // 取得数カウント(もっと楽できるはず)
    $count_sql = "select count(id) from board group by topic_id";
    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute();
    $count = $count_stmt->fetch(PDO::FETCH_COLUMN);
}catch (\Exception $e) {
    return FALSE;
}
?>

<div>
    <?php
    // 表示
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $id = $count;
        $comment = $row["comment"];
        $created = $row["created"];
        echo '<p>'.$id.'</p>';
        echo '<p>'.$comment.'</p>';
        echo '<p>'.$created.'</p>';
        $count--;
    }
    ?>
</div>

<form action="post.php" method="post">
    <input type="hidden" name="class" value="bord">
    <textarea name="comment"></textarea>
    <input type="submit" value="送信">
</form>