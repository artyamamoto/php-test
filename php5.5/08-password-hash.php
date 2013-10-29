<?php
/**
 * パスワード暗号化が簡単にできるとのこと。
 *
 * 現在はハッシュアルゴリズムが CRYPT_BLOWFISH しか用意されておらず、
 * 指定できる定数が PASSWORD_DEFAULT, PASSWORD_BCRYPT の2種類のみ。
 *
 * PASSWORD_DEFAULT は将来的に（というかころころ）変わる可能性がありますが、
 * password_hash() 関数の戻り値にはアルゴリズムやソルト、コストが逆算できるそうなので
 * PASSWORD_DEFAULT が変わったとしても過去の暗号化パスワードはそのまま検証可能ということになります。
 *
 * http://www.php.net/manual/ja/function.password-hash.php
 * http://www.php.net/manual/ja/password.constants.php
 *
 * ※password_needs_rehash() でアルゴリズムの変更を検知することができます。
 *
 * どの程度セキュアなのかは未検証。
 *   - ソルトストレッチング内蔵
 */
$passwd = "kazuo-yamamoto";

echo "<pre>";

// 同じパスワードでも毎回、ソルトを生成して暗号化するため、結果は違う文字列になります。
$hashed_passwd_1 = password_hash($passwd, PASSWORD_DEFAULT);
$hashed_passwd_2 = password_hash($passwd, PASSWORD_BCRYPT );

printf("password_hash(%s, PASSWORD_DEFAULT) = %s\n",$passwd,$hashed_passwd_1);
printf("password_hash(%s, PASSWORD_DEFAULT) = %s\n",$passwd,$hashed_passwd_2);
echo "\n";

// ソルトなどの情報が暗号化文字列に含まれるため、パスワードの検証は独自の関数を利用します。
echo 'password_verify($passwd, $hashed_passwd_1) = ';
var_dump(password_verify($passwd, $hashed_passwd_1));

echo 'password_verify($passwd, $hashed_passwd_2) = ';
var_dump(password_verify($passwd, $hashed_passwd_2));

echo "\n";

// アルゴリズムが変わったかどうかは password_needs_rehash() で調べられる。
echo 'password_needs_rehash($hashed_passwd_1,PASSWORD_DEFAULT) = ';
var_dump(password_needs_rehash($hashed_passwd_1,PASSWORD_DEFAULT));

echo 'password_needs_rehash($hashed_passwd_2,PASSWORD_DEFAULT) = ';
var_dump(password_needs_rehash($hashed_passwd_2,PASSWORD_DEFAULT));


echo "</pre>";





