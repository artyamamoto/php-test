<?php

goto KingCrimson;
echo "原因";

KingCrimson:
echo "キングクリムゾン！\n";


/*
 * goto文によって遷移できるラベルは同一スコープ内に限られますので、
 * 以下のクラスの Diavolo->suicide()を呼び出すとエラーになります。
 *
class Diavolo {
    public function suicide() {
        goto KingCrimson;
    }
}
*/

