<?php
require("../database/config.php");
require("../function.php");

// 種類別

$kind = $_GET["kind"]; //カテゴリ別に振り分ける

// $kind = "weapon"; // テスト用

// DBセレクト
try{
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $sql = "select id, topic, image_content, created from topic where kind=? order by created desc";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$kind]);
}catch (\Exception $e) {
    return FALSE;
}
?>

<div>
    <?php
    // 表示
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $id = $row["id"];
        $topic = $row["topic"];
        $created = $row["created"];
        echo '<a href="bord.php?topic_id='.$id.'">';
        echo '<p>'.$topic.'</p>';
        echo '<p>'.$created.'</p>';
        echo '</a>';
    }
    ?>
</div>

<form action="post.php" method="post">
    <input type="hidden" name="class" value="topic">
    <input type="hidden" name="kind" value="<?=$kind?>">
    <!-- <input type="file" name="image" required> -->
    <input type="text" name="topic" required>
    <input type="submit" value="送信">
</form>