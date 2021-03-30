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
                    <div style="background-image: url(../img/武器について.jpg);"></div>
                    <a href="topic.php?kind=weapon">
                        武器掲示板
                    </a>
                </div>
                <div class=content_card>
                    <div style="background-image: url(../img/基礎知識について.png);"></div>
                    <a href="topic.php?kind=char">
                        キャラ掲示板
                    </a>
                </div>
                <div class=content_card>
                    <div style="background-image: url(../img/立ち回り.jpg);"></div>
                    <a href="topic.php?kind=move">
                        立ち回り掲示板
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
</body>
</html>