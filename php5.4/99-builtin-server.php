<?php
/* php5.4 から利用できるようになったbuiltin-server は以下のように設定します。
 *
 * // 最低限の起動は以下のようになります。
 * // コマンドを実行したパスがドキュメントルートになります。
 *
 * php -S localhost:8000
 *
 * // オプション等
 * php -S localhost:8000 -t [ドキュメントルート] -c [php.iniのパス]
 *
 * // mod_rewrite的なことをする場合
 * php -S localhost:8000 router.php
 *
 * router.php の内容はこのスクリプトを参照のこと
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
