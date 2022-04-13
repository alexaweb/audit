<?php
function showCheckmark($alttext) {
$str = <<<HTML
	<img src="/audit/images/checkmark-14.png" alt="{$alttext}" title="{$alttext}">
HTML;
return $str;
}
?>
