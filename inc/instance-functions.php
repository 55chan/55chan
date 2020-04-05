<?php
/*
 * Custom functions, I think the best is to make a new one, there's a lot of code in functions already
 */ 

 // Import from 8ch
function less_ip($ip, $board = '') {
	global $config;

	$ipv6 = (strstr($ip, ':') !== false);
	$has_range = (strstr($ip, '/') !== false);

	if ($has_range) {
		$ip_a = explode('/', $ip);
		$ip = $ip_a[0];
		$range = $ip_a[1];
	}

	$in_addr = inet_pton($ip);

	if ($ipv6) {
		// Not sure how many to mask for IPv6, opinions?
		$mask = inet_pton('ffff:ffff:ffff:ffff:ffff:0:0:0');
	} else {
		$mask = inet_pton('255.255.0.0');
	}

	$final = inet_ntop($in_addr & $mask);
	$masked = str_replace(array(':0', '.0'), array(':x', '.x'), $final);

	if ($config['hash_masked_ip']) {
		$masked = substr(sha1(sha1($masked . $board) . $config['secure_trip_salt']), 0, 10);
	}

	$masked .= (isset($range) ? '/'.$range : '');

	return $masked;
}