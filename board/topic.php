<?php
require("../function.php");

// 種類別
$kind = $_GET["kind"];

$kind = "weapon"; // テスト用

// DBセレクト
try{
    $sql = "select topic, image_content, created from topic where kind=? order by created desc";
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
        $comment = $row["comment"];
        $created = $row["created"];
        echo '<p>'.$id.'</p>';
        echo '<p>'.$comment.'</p>';
        echo '<p>'.$created.'</p>';
    }
    ?>
</div>