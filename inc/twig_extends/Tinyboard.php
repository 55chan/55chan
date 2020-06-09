<?php

namespace Twig\Extensions\Extension

use \Twig\Extension;

class Tinyboard extends AbstractExtension
{
	/**
	* Returns a list of filters to add to the existing list.
	*
	* @return array An array of filters
	*/
	public function getFilters()
	{
		return array(
			new \Twig\TwigFilter('filesize', 'format_bytes'),
			new \Twig\TwigFilter('truncate', 'twig_truncate_filter'),
			new \Twig\TwigFilter('truncate_body', 'truncate'),
			new \Twig\TwigFilter('truncate_filename', 'twig_filename_truncate_filter'),
			new \Twig\TwigFilter('extension', 'twig_extension_filter'),
			new \Twig\TwigFilter('sprintf', 'sprintf'),
			new \Twig\TwigFilter('capcode', 'capcode'),
			new \Twig\TwigFilter('remove_modifiers', 'remove_modifiers'),
			new \Twig\TwigFilter('hasPermission', 'twig_hasPermission_filter'),
			new \Twig\TwigFilter('date', 'twig_date_filter'),
			new \Twig\TwigFilter('poster_id', 'poster_id'),
			new \Twig\TwigFilter('remove_whitespace', 'twig_remove_whitespace_filter'),
			new \Twig\TwigFilter('less_ip', 'twig_less_ip'),
			new \Twig\TwigFilter('count', 'count'),
			new \Twig\TwigFilter('ago', 'ago'),
			new \Twig\TwigFilter('until', 'until'),
			new \Twig\TwigFilter('push', 'twig_push_filter'),
			new \Twig\TwigFilter('bidi_cleanup', 'bidi_cleanup'),
			new \Twig\TwigFilter('addslashes', 'addslashes'),
			new \Twig\TwigFilter('trans', 'trans'),
		);
	}
	
	/**
	* Returns a list of functions to add to the existing list.
	*
	* @return array An array of filters
	*/
	public function getFunctions()
	{
		return array(
			new \Twig\TwigFunction('time', 'time'),
			new \Twig\TwigFunction('floor', 'floor'),
			new \Twig\TwigFunction('timezone', 'twig_timezone_function'),
			new \Twig\TwigFunction('hiddenInputs', 'hiddenInputs'),
			new \Twig\TwigFunction('hiddenInputsHash', 'hiddenInputsHash'),
			new \Twig\TwigFunction('ratio', 'twig_ratio_function'),
			new \Twig\TwigFunction('secure_link_confirm', 'twig_secure_link_confirm'),
			new \Twig\TwigFunction('secure_link', 'twig_secure_link'),
			new \Twig\TwigFunction('link_for', 'link_for')
		);
	}
	
	/**
	* Returns the name of the extension.
	*
	* @return string The extension name
	*/
	public function getName()
	{
		return 'tinyboard';
	}
}

function twig_timezone_function() {
	return 'Z';
}

function twig_push_filter($array, $value) {
	array_push($array, $value);
	return $array;
}

function twig_remove_whitespace_filter($data) {
	return preg_replace('/[\t\r\n]/', '', $data);
}

function twig_date_filter($date, $format) {
	return gmstrftime($format, $date);
}

function twig_hasPermission_filter($mod, $permission, $board = null) {
	return hasPermission($permission, $board, $mod);
}

function twig_extension_filter($value, $case_insensitive = true) {
	$ext = mb_substr($value, mb_strrpos($value, '.') + 1);
	if($case_insensitive)
		$ext = mb_strtolower($ext);		
	return $ext;
}

function twig_sprintf_filter( $value, $var) {
	return sprintf($value, $var);
}

function twig_truncate_filter($value, $length = 30, $preserve = false, $separator = '…') {
	if (mb_strlen($value) > $length) {
		if ($preserve) {
			if (false !== ($breakpoint = mb_strpos($value, ' ', $length))) {
				$length = $breakpoint;
			}
		}
		return mb_substr($value, 0, $length) . $separator;
	}
	return $value;
}

function twig_filename_truncate_filter($value, $length = 30, $separator = '…') {
	if (mb_strlen($value) > $length) {
		$value = strrev($value);
		$array = array_reverse(explode(".", $value, 2));
		$array = array_map("strrev", $array);
		
		$filename = &$array[0];
		$extension = isset($array[1]) ? $array[1] : false;

		$filename = mb_substr($filename, 0, $length - ($extension ? mb_strlen($extension) + 1 : 0)) . $separator;

		return implode(".", $array);
	}
	return $value;
}

function twig_ratio_function($w, $h) {
	return fraction($w, $h, ':');
}
function twig_secure_link_confirm($text, $title, $confirm_message, $href) {
	global $config;

	return '<a onclick="if (event.which==2) return true;if (confirm(\'' . htmlentities(addslashes($confirm_message)) . '\')) document.location=\'?/' . htmlspecialchars(addslashes($href . '/' . make_secure_link_token($href))) . '\';return false;" title="' . htmlentities($title) . '" href="?/' . $href . '">' . $text . '</a>';
}
function twig_secure_link($href) {
	return $href . '/' . make_secure_link_token($href);
}
function twig_less_ip($ip, $board = '') {
	return less_ip($ip, $board);
}
function trans($string) {
	return ___($string);
}
