<?php
/*
 * try catch で finally が使えるようになりました。
 * 例外があってもなくてもfinallyの中は最後に実行されます、というのが一般的な説明ですが、
 * 実際にはtry中に何があってもかならず実行されます。
 * （Java / Javascriptなどと同じです）
 */
echo "<pre>";

function test($throwException=false,$goto=false,$return=false,$fatal_error=false) {
    try {
        echo "[Try] \n";
        if ($throwException)
            throw new Exception('Test');
        if ($goto)
            goto endall;
        if ($return)
            return;
        if ($fatal_error) {
            unknown_func();
        }
    } catch(Exception $e) {
        echo "[Exception] \n";
    } finally {
        // fatal error時にはfinallyが実行されないが、
        // 一応、ファイル出力にて確認する。（標準出力が死んでいるだけかもしれないため、、）
        if ($fatal_error) {
            file_put_contents("/tmp/kazuo", "your life encountered a fatal error");
            @chmod("/tmp/kazuo", 0777);
        }
        echo "[Finally] \n";
    }
    return;

    endall:
        echo "Goto";
}
echo '<h4>Exceptionが発生する例</h4>';
test(true);

echo '<h4>Exceptionが発生しない例</h4>';
test(false);

echo '<h4>try中でGoto文が実行されてもfinallyは実行される</h4>';
test(false, true);

echo '<h4>try中でreturn文が実行されてもfinallyは実行される</h4>';
test(false, false, true);

echo '<h4>try中でFatal Errorになった時はfanallyは実行されないようだ。</h4>';
test(false, false,false,true);

echo "</pre>";
?>
