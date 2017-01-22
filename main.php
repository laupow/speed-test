<?php

require_once 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);

function runSpeedtest(array $args = ["--json"]) {
	$python 	= "/usr/bin/python";
	$speedtest 	= "/speedtest-cli/speedtest.py";
	$speedtestCmd = join(" ", [$python, __DIR__ . $speedtest, implode(" ", $args)]);
	$output = shell_exec($speedtestCmd);
	return $output;
}

function getDbh() {
	$dsn = 'mysql:host=' . getenv("DB_HOST") . ';dbname=' . getenv("DB_NAME") . "';charset=utf8mb4;";
	$dbh = new PDO($dsn, getenv("DB_USER"), getenv("DB_PASS"));
	return $dbh;
}

function flattenDataForInsert(array $array, $prefix = "") {
	$new = [];
	foreach($array as $key => $value) {
		if (is_array($value)) {
			$vals = flattenDataForInsert($value, $key . "_");
			$new = array_merge($new, $vals);
		} else {
			$new[$prefix . $key] = $value;
		}
	}
	return $new;
}

function saveResults(array $data) {
	$keys = "`". implode("`, `", array_keys($data)) ."`";
	$val_params = ":" . implode(", :", array_keys($data));
	$sql = "INSERT INTO `logs` ($keys) VALUES ($val_params)";

	$dbh = getDbh();
	$stmt = $dbh->prepare($sql);
	foreach ($data as $k => $v) {
		$stmt->bindParam(":$key", $v);
	}
}


$json = runSpeedtest();
// testing
// $json = file_get_contents("speedtest-cli_output_example.json");

$data = json_decode(trim($json), true);
$data = flattenDataForInsert($data);

saveResults($data);


