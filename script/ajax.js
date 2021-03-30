$(function () {
    $('edit_area').ready(function () {
            var num = location.pathname;
            console.log(num);
            //開いた時点での送る処理
            $.ajax({
                type: "post",//送る方法
                url: "./ajax.php", //正しく送れたら、ajax.phpへ
                data: {
                    url: num//送る内容
                }
            })
            .done(function (res) {
                // ajaxがok
                let msg = JSON.parse(res);
                $("#url").attr("value",msg);
            })
            //結果が帰ってこなかった時と、送れなかった時の処理
            .fail(function () {
                // 取得エラー
            })
            //毎回どんな処理になっても動く
            .always(function () {
            })
    });
    return false;
});