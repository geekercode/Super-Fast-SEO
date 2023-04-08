<?php
// 返回414
function superfastseo_return__status_414() {
	@header('HTTP/1.1 414 Request-URI Too Long');
	@header('Status: 414 Request-URI Too Long');
	@header('Connection: Close');
	@exit;
}
?>