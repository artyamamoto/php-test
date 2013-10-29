<?php
echo '<pre>';
/*
 * 関数の戻り値に直接[添字]をつけることで結果を一回変数に代入しなくても
 * 戻り値の配列のメンバー変数に直接アクセスすることができます。
 */
echo 'range(0,100)[10] = ';
var_dump(range(0,100)[10]);

/*
 * [添字]内部は変数を含め、どのような文章でも可能なようです。
 */
echo 'range(0,100)[$j = ++0] = ';
$i = $j = 0;
var_dump(range(0,100)[ $j = ++$i]);

/*
 * どのような構文に対しても[添字]がつけれるわけではなく、
 * 以下のように命令文に[添字]をつけるとエラーになるようです。
 */
//var_dump(($tmp = range(0,100))[10]);

echo '</pre>';
?>