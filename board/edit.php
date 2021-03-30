<?php
require("../database/config.php");
require("../function.php");
$url = $_SERVER['REQUEST_URI'];
try {
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $sql = "select contents, created from edit where url=? order by created desc limit 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$url]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$row){
        $contents = "空白です";
        $created = date("Y-m");
    }else{
        $contents = $row["contents"];
        $created = $row["created"];
    }
} catch (\Exception $e) {
    return FALSE;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/edit.css">
    <script type="text/javascript" src="../script/edit-button.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../script/ajax.js"></script>

</head>

<body>
    <?php
    echo $contents;
    echo $created;
    ?>
    <input type="button" value="編集" onclick="toggleTextArea()"><br>
    <form action="post.php" method="post" id=edit_area>
        <input type="hidden" name="url" id="url" value="">
        <input type="hidden" name="class" value="edit">
        <textarea name="contents"></textarea>
        <input type="submit" value="作成">
    </form>
</body>

</html>