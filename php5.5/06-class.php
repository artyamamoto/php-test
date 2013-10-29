<?php
/*
 * クラス名::class で、名前空間付きのクラス名が取得できます。
 * 但し、なぜか存在しないクラスのクラス名でも取得できてしまいます。
 *
 * ※使いどころがよくわからない。。。
 */
namespace test1\test1 {
    class MyTest {}
}
namespace main {
    use \test1\test1;

    echo "<pre>";
    printf("UnknownTest => %s\n",\test1\test1\UnknownTest::class);
    printf("MyTest => %s\n",\test1\test1\MyTest::class);
    echo "</pre>";
}

?>
