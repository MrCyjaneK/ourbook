<?php require_once 'function.resize.php'; ?>
<?php
include '../data.php';
header("Content-Type: application/json");
$settings = array('h'=>150, 'w'=>150, 'scale'=>true);
$n = 0;
$type = $_GET['t'];

if ($type === 'photo') {
	$response = [
		"items" => [
			[
				"t" => "thumb",
				"k" => "",
				"i" => "",
				"d"  => [
					"img" => base64_encode(file_get_contents(resize(__DIR__."/../_i/thumb.png",$settings)))
				]
			]
		],
		"status" => "ok"
	];
	die(json_encode($response, JSON_PRETTY_PRINT));
}

if ($type === "friend") {
	die('{
    "items": [
        {
            "t": "friend",
            "k": "sanjdhrezzcs24mu",
            "i": "",
            "d": {
                "addr": "sanjdhrezzcs24mu"
            }
        }
    ],
    "status": "ok"
}');
}

if ($type === 'info') {
	die(
		json_encode([
			"items" => [
				[
					"t" => "info",
					"k" => "",
					"i" => "",
					"d" => [
						"name" => "Memes Bot",
						"location" => "Earth",
						"lang" => "English and PHP",
					]
				]
			],
			"status" => "ok"
		],JSON_PRETTY_PRINT)
	);
}

if ($type === "thumb" || $type === "name") {
	chdir('../_i/');
	include 'index.php';
	die();
}
$posts = array_reverse(glob('./posts/*'));
$response = [
	"items" => [
	],
	"status" => "ok"
];
for ($i = round($_GET['i']); $i < (round($_GET['i']) + $_GET['n']); $i++) {
	$j = __DIR__."/".$posts[$i];
	
	if (!file_exists("$j") || $j == null || !isset($posts[$i])) continue;
	//echo $j." = $i\n";
	//var_dump($j);
	$response['items'][$i] = [
		"t" => "post",
		"k" => file_get_contents($j.'/date.txt'),
		"i" => "",//Number($i*21371488),
		"d" => [
			"text" => file_get_contents($j.'/text.txt'),
			"date" => file_get_contents($j.'/date.txt'),
			"addr" => $_id,
			"name" => "Memes Bot",
			"thumb" => base64_encode(file_get_contents("../_i/thumb.png"))
		]
	];
	if (file_exists("$j/img.png")) {
		//var_dump(resize("./posts/$i/img.png"));
		$response['items'][$i]['d']['img'] = base64_encode(file_get_contents(resize("$j/img.png",$settings)));
	}
	$n++;
}
die(json_encode($response, JSON_PRETTY_PRINT));