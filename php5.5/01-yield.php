<?php
/*
 * yield文はジェネレータと呼ばれ、yieldキーワードで呼び出すことが出来ます。
 * Iteratorインターフェースと似ていますが、こちらのほうがシンプルです。
 *
 * 一旦変数にすべてを格納する必要がないため、yield を使わない場合よりも省メモリです。
 */
class MyFile {
    public $path = null;
    public function __construct($path) {
        if (!is_file($path) || !is_readable($path))
            throw new Exception("failed to open $path");
        $this->path = $path;

        if (!($this->fp = fopen($this->path,"r"))) {
            @fclose($this->fp);
            $this->fp;
            throw new Exception("failed to open $path");
        }

    }
    public function fetch() {
        while(($line = fgets($this->fp)) !== false) {
            yield $line;
        }
    }
    public function __destruct() {
        if ($this->fp) {
            @fclose($this->fp);
            $this->fp = null;
        }
    }
}
echo "<pre>";
foreach((new MyFile(__FILE__))->fetch() as $i => $line) {
    printf("[%d] %s\n", $i, htmlspecialchars($line,ENT_QUOTES));
}
echo "</pre>";



?>
