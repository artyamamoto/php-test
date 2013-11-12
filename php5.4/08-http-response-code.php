<?php
/*
 * http_response_code() 関数により、HTTPレスポンスコードが指定できます。
 * これにより header("404 Not Found"); のような指定をする必要がなくなりました。
 */
// レスポンスコードを取得
var_dump(http_response_code());

// レスポンスコードを設定
// ここで 404指定をしているので、HTTP Headerを見ると
// 404 Not Found になっていることが確認できる。
http_response_code(404);
var_dump(http_response_code());

?>
