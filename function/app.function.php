<?php

function redirect_to($url) {
	if (isset($url)) {
		header("Location: " . $url);
	}
}

function sanitize_output($string) {
	return htmlspecialchars($string);
}

function database_alias($host) {
	$result = "";
	$url = explode(".", $host);

	if (strpos($url[0], 'dev') !== false) {
		$result = "jordanandrobert-dev";
	} else {
		$result = "jordanandrobert-prod";
	}

	return $result;
}

function year_begin_get($effectiveDT) {
	$partDT = explode('-', $effectiveDT);
	$year = $partDT[0];
	$month   = $partDT[1];

	if ($month >= 1 && $month <= 4) {
		$year = $year - 1;
	}

	return $year.'-04-01';
}