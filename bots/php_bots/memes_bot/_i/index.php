<?php
//header("Content-Type: application/json");
$type = $_GET['t'];
if ($type === "name") {
	$response = [
		"items" => [
			[
				"t" => "name",
				"k" => "",
				"i" => "",
				"d" => [
					"name" => "Memes Bot"
				]
			]
		],
		"status" => "ok"
	];
}
if ($type === "thumb") {
	$response = [
		"items" => [
			[
				"t" => "thumb",
				"k" => "",
				"i" => "",
				"d"  => [
					"thumb" => base64_encode(file_get_contents("./thumb.png"))
				]
			]
		],
		"status" => "ok"
	];
}

die(json_encode($response, JSON_PRETTY_PRINT));