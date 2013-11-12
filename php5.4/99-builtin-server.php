<?php
/**
 * php5.4 から利用できるようになったbuiltin-server は以下のように設定します。
 * コマンドを実行したパスがドキュメントルートになります。
 *
 * $ php -S localhost:8000
 * $ php -S localhost:8000 -t [ドキュメントルート] -c [php.iniのパス]
 *
 * 引数にphpファイルを指定することで、レスポンスを調整できます。
 * mode_rewrite のような使い方が可能です。
 * （以下はこのファイルを指定しての起動）
 *
 * $ php -S localhost:8000 99-builtin-server.php
 */

// .html => .php
if (substr($_SERVER["REQUEST_URI"],-5,5) == '.html') {
    //$path = dirname(__FILE__).$path;
    $path = dirname(__FILE__).'/..'.str_replace('.html','.php',$_SERVER["REQUEST_URI"]);
    include $path;
}
// /xmas
else if ($_SERVER["REQUEST_URI"] == "/xmas") {
    echo "Merry Xmas!";
}
// default
else {
    return false;// default
}
