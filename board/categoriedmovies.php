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
            <div class=content_h1>カテゴリ別動画</div>
            <div class=content_items>
                <div class=content_card>
                    <div style="background-image: url(../img/武器解説.png);"></div>
                    <a href="weaponkaisetu.php">
                    武器解説
                    </a>
                </div>
                <div class=content_card>
                    <div style="background-image: url(../img/立ち回り.jpg);"></div>
                    <a href="tatimawari.php">
                    立ち回り解説
                    </a>
                </div>
                <div class=content_card>
                    <div style="background-image: url(../img/レジェンド解説.png);"></div>
                    <a href="legendkaisetu.php">
                    レジェンド解説
                    </a>
                </div>
                <div class=content_card>
                    <div style="background-image: url(../img/上達法について.jpg);"></div>
                    <a href="joutatuhou.php">
                    上達法について
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>