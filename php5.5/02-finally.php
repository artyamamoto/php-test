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
            file_put_contents("/tmp/kazuo", 1);
            unknown_func();
        }
    } catch(Exception $e) {
        echo "[Exception] \n";
    } finally {
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
test(false, false,true);

echo '<h4>try中でFatal Errorになった時でさえfinallyは実行されるが、<br />'.
         'Fatal Error時に標準出力が死ぬのでstdoutから確認することはできない。</h4>';
test(false, false,false,true);

echo "</pre>";
?>
