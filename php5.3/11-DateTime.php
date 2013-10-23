<?php
echo "<pre>";

//=== 現在の日時
$dt = new DateTime("NOW");
echo $dt->format('Y-m-d H:i:s'), "\n";

//=== 日付の加算
$dt->add(new DateInterval('P10DT1H'));
echo $dt->format('Y-m-d H:i:s'), "\n";

//=== 日付の減算
$dt->sub(new DateInterval('P1YT2H'));
echo $dt->format('Y-m-d H:i:s'), "\n";

//=== 日付の差分
$dt1 = new DateTime("2010-11-01");
$dt2 = new DateTime("2011-5-01");
$interval = $dt1->diff($dt2);

echo $interval->format("%R%a days");

echo "</pre>";
?>
