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
            <div class=content_h1>基本操作</div>
            WASD 移動<br>
            左クリック 打つ<br>
            中央クリック ...<br>
            <div class=content_items>
            <div class="content_iframe">
<iframe width="112" height="63" src="https://www.youtube.com/embed/bwY9HLU4_KI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="content_iframe">
<iframe width="112" height="63" src="https://www.youtube.com/embed/bwY9HLU4_KI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="content_iframe">
<iframe width="112" height="63" src="https://www.youtube.com/embed/bwY9HLU4_KI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="content_iframe">
<iframe width="112" height="63" src="https://www.youtube.com/embed/bwY9HLU4_KI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            </div>
            <?php
            require_once("edit.php");
            ?>
        </div>
    </div>
</body>
</html>