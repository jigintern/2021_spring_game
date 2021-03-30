<?php
require("../database/config.php");
if (!isset($_SESSION)) {
    session_start();
}
// トピックid
$topic_id = $_GET["topic_id"];
$_SESSION["topic_id"] = $topic_id;

// DBセレクト
try{
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $sql = "select id, comment, created from board where topic_id=? order by created desc";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$topic_id]);
    // 取得数カウント(もっと楽できるはず)
    $count_sql = "select count(id) from board where topic_id=? group by topic_id";
    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute([$topic_id]);
    $count = $count_stmt->fetch(PDO::FETCH_COLUMN);
    $topic_sql = "select topic from topic where id=?";
    $topic_stmt = $pdo->prepare($topic_sql);
    $topic_stmt->execute([$topic_id]);
    $topic = $topic_stmt->fetch(PDO::FETCH_COLUMN);
}catch (\Exception $e) {
    return FALSE;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="../css/common.css">
<link rel="stylesheet" href="../css/bord.css">
<link rel="stylesheet" href="../css/content.css">
<link rel="stylesheet" href="../css/reset.css">
<title>Apex トップページ</title>
</head>
<body>
<?php
require_once("header.php");
?>
<div class=wrapper>
    <?php
    require_once("banner.php");
    ?>
    <div class=content>
        <div class=content_h1><?php echo $topic ?></div>
        <div>
            <?php
            // 表示
            $id = $count;
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $created = $row["created"];
                $comment = $row["comment"];
                echo <<<EOT
                <div class=bord_response>
                    <p>$id <span class=bord_time>$created</span></p>
                    <p>$comment</p>
                </div>
                EOT;
                $id--;
            }
            $count = 0;
            ?>
        </div>

        <form action="post.php" method="post">
            <input type="hidden" name="class" value="bord">
            <textarea name="comment"></textarea>
            <input type="submit" value="送信">
        </form>
    </div>
</div>
<?php
require_once("footer.php");
?>
</body>
</html>