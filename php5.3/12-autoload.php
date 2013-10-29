<?php
namespace Test1;
/*
 * あらかじめ __autoload()関数を定義しています。
 * __autoload()関数はルートの名前空間に定義する必要があるため、ファイルを分けています。
 * 参考）https://github.com/artyamamoto/php-test/blob/master/php5.3/12-autoload/autoload.php
 */
require_once dirname(__FILE__)."/12-autoload/autoload.php";
//=== main =====

/* クラスが生成されます。
 *
 * 呼び出すクラスの名前空間とnewする場所の名前空間が同じですが、
 * __autoload() 関数の引数には常に名前空間込みの絶対パスが渡されます。
 *
 * __autoload() 関数内から例外を投げることができ、new を呼び出した側で補足できます。
 * （ファイルが存在しない場合に例外を投げています）
 */
echo '<pre>';
echo '<h4>\\Test1\\MyClassクラスのインスタンスを生成 -> Test1/MyClass.phpの読み込み</h4>';
$cls = new \Test1\MyClass();

echo '<h4>\\Test1\\UnknownClassクラスのインスタンスを生成 -> Test1/UnknownClass.phpが存在しないため、例外</h4>';
try {
    $cls = new \Test1\UnknownClass();
} catch(\Exception $e) {
    printf('<span class="errmsg">[Exception] : %s</span>', $e->getMessage());
}
echo '</pre>';



?>