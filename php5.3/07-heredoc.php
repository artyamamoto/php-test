<?php
$message = '変数の中身';

//=== Heredoc =================
echo '<h4>普通のHEREドキュメント</h4>';
echo '<pre>';
echo <<<"EOD"

    ${message}

EOD;
echo '</pre>';

//=== Newdoc =================
echo '<h4>Newdoc</h4>';
echo '<pre>';
echo <<<'EOD'

    ${message}

EOD;

echo '</pre>';
?>
