<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="../css/common.css">
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
            <div class=content_h1>初心者向け記事一覧</div>
            <div class=content_items>
                <div class=content_card>
                    <div style="background-image: url(../img/基本操作について.jpg);"></div>
            <a href="kihonsousa.php">
                    基本操作について
            </a>
                </div>
                <div class=content_card>
                    <div style="background-image: url(../img/基礎知識について.png);"></div>
                    基礎知識について
                </div>
                <div class=content_card>
                    <div style="background-image: url(../img/武器について.jpg);"></div>
                    武器について
                </div>
                <div class=content_card>
                    <div style="background-image: url(../img/上達法について.jpg);"></div>
                    上達法について
                </div>
            </div>
        </div>
    </div>
</body>
</html>