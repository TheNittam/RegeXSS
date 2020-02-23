<?php
$f = @fopen("regexss.json", "r+");
if ($f !== false) {
	ftruncate($f, 0);
	fclose($f);
}
?>