<?php

require_once 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);

function runSpeedtest(array $args = ["--json"]) : string {
	$python 	= "/usr/bin/python";
	$speedtest 	= "/speedtest-cli/speedtest.py";
	$speedtestCmd = join(" ", [$python, __DIR__ . $speedtest, implode(" ", $args)]);
	$output = shell_exec($speedtestCmd);
	return $output;
}

function getDbh() {
	$dsn = 'mysql:host=' . getenv(DB_HOST) . ';dbname='.getenv(DB_NAME) . "';charset=UTF8;";
	$dbh = new PDO($dsn, getenv(DB_USER), $getenv(DB_PASS));
}

function saveResults(array $data) {
	print_r($data);
}


$json = runSpeedtest();
$data = json_decode(trim($json), true);
saveResults($data);


