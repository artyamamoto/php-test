<?php
/**
 * php5.5.2 から Strict Sessions がPHPにマージされました。
 *
 * デフォルトではOFFですが、php.ini のsession.use_strict_mode をOnにすることで
 * クッキーに含まれた任意の（PHPが発行していない）セッションIDを使わないようになります。
 *
 * これにより、セッションフィクサセーション攻撃を回避することができるようになります。
 */
session_start();
session_regenerate_id(true);    // セッションIDを再発行するとより安全。

printf("session_id() = %s<br />", session_id());
printf("_SESSION[cnts]=<b>%d</b><br />",
            (isset($_SESSION["cnts"]) ?
                ++$_SESSION["cnts"] :
                ($_SESSION["cnts"] = 0)));

echo '<div><input type="button" value="reload" onclick="javascript: location.reload();"/></div>';
?>