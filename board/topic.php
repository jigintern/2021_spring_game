<?php
require("../database/config.php");
require("../function.php");

// 種類別

$kind = $_GET["kind"]; //カテゴリ別に振り分ける

// $kind = "weapon"; // テスト用

// DBセレクト
try{
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $sql = "select id, topic, image_path, created from topic where kind=? order by created desc";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$kind]);
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
<link rel="stylesheet" href="../css/topic.css">
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
        <div>
            <?php
            // 表示
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id = $row["id"];
                $topic = $row["topic"];
                $image_path = $row["image_path"];
                $created = $row["created"];
                echo <<<EOT
                <a href="bord.php?topic_id=$id">
                <div class=topic>
                    <div class="topic_image" style="background-image: url($image_path);"></div>
                    <div class="topic_discription">
                        <p class="bord_thread">$topic</p>
                        <p>$created</p>
                    </div>
                </div>
                </a>
                EOT;
            }
            ?>
        </div>

        <form action="post.php" method="post" enctype=multipart/form-data>
            <input type="hidden" name="class" value="topic"/>
            <input type="hidden" name="kind" value="<?=$kind?>"/>
            <input type="file" name="image" required/>
            <input type="text" name="topic" required/>
            <input type="submit" value="作成"/>
        </form>
    </div>
</div>
<?php
require_once("footer.php");
?>
</body>
</html>