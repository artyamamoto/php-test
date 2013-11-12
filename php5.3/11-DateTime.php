<?php
/**
 * 5.3で DateIntervalクラスが追加されました。
 */
date_default_timezone_set("Asia/Tokyo");
echo '<table border="1">';

//=== 現在の日時
$dt = new DateTime("NOW");
printf("<tr><th>new DateTime(NOW)</th><td>%s</td></tr>",$dt->format('Y-m-d H:i:s'));

//=== 日付の加算
$dt->add(new DateInterval('P10DT1H'));  // 10日と1時間
printf("<tr><th> + new DateInterval('P10DT1H')</th><td>%s</td></tr>",$dt->format('Y-m-d H:i:s'));

//=== 日付の減算
$dt->sub(new DateInterval('P1YT2H')); // 1年と2時間
printf("<tr><th> - new DateInterval('P1YT2H')</th><td>%s</td></tr>",$dt->format('Y-m-d H:i:s'));

//=== 日付の差分
$dt1 = new DateTime("2010-11-01");
$dt2 = new DateTime("2011-5-01");
$interval = $dt1->diff($dt2);

printf('<tr><th>("2010-11-01" - "2011-05-01")</th><td>%s</td></tr>',$interval->format("%R%a days"));

echo "</table>";
?>
