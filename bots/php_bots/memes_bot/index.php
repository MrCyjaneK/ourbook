<?php
header("Content-Type: text/plain");
echo "Beep, Boop. I'm a bot
To get add me to your wall simply add 'memes6tco5stdgn5' to your friends in ReDone
You can get ReDone here: https://github.com/MrCyjaneK/ReDone/releases
    - I can't reply to your messages (I don't even listen to them)
    - I'll simply display memes on your wall if you check my profile. That's it. Just memes.";
die();
echo "Estabilishing connection to tor... OK\n";
stream_context_set_default(
	array(
		'http' => array(
			'proxy' => "tcp://127.0.0.1:9080",
		)
	)
);
$id = $_GET['user'];
$id = preg_replace("/[^a-zA-Z0-9]+/", "", $id);

if (strlen($id) !== 16) {
	die("Wrong ID");
}

echo "Fetching info about: \"$id\"\n";
/*
public String getUrl() {
    return "http://" + address + ".onion/a?t=" + type + "&i=" + index + "&n=" + (count + 1);
}
*/
$type    = "name";
$index   = 0;
$count   = 3;
//echo "$link\n";
echo "========\n";
echo `curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s https://check.torproject.org/ | cat | grep -m 1 Congratulations | xargs`;
echo "========\n";
//// NULL????
//$link    = "http://" . $id     . ".onion/a?t=" . "name". "&i=" .$index . "&n=" . $count;
//$username = `curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s "$link"`;
//$username = json_decode($username)->name;
//var_dump($response);

//$link    = "http://" . $id     . ".onion/i?t=" . "thumb". "&i=" .$index . "&n=" . $count;
////echo `curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s "$link"`;

include "./data.php";

$people = $pdo->prepare("SELECT * FROM `people` WHERE `address`=:address");
$people->bindParam(":address", $id);
$people->execute();
$person = $people->fetchAll();
if ($person == []) {
	// Let's check him and add to database.
	$link    = "http://" . $id     . ".onion/a?t=" . "post". "&i=" .$index . "&n=" . 1;
	$posts = json_decode(`curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s "$link"`);
	//print_r($posts);
	$posts = $posts->items;
	
	if (isset($posts[0]) &&
		isset($posts[0]->d) &&
		$posts[0]->d->addr === $id
		) {
		$userinfo = $posts[0]->d;
		//print_r($userinfo);
		$thumb = $userinfo->thumb;
		$thumb_hash = hash('sha256', $thumb);
		$name = $userinfo->name;
		$date = time();
		
		$data = json_encode($userinfo,JSON_PRETTY_PRINT);
		
		
		
		$p = $pdo->prepare("SELECT * FROM `img` WHERE `img_hash`=:h");
		$p->bindParam(":h", $thumb_hash);
		$p->execute();
		$p = $p->fetchAll();
		if ($p != []) {
			$q1 = $pdo->prepare("INSERT INTO `img`(`img`, `img_hash`) VALUES (:img,:img_hash)");
			$q1->bindParam(":img",$thumb);
			$q1->bindParam(":img_hash",$thumb_hash);
			$q1->execute();
		}
		$q2 = $pdo->prepare("INSERT INTO `people`(`address`, `data`, `thumb_hash`) VALUES (:address, :data, :thumb_hash)");
		$q2->bindParam(":address", $id);
		$q2->bindParam(":data", $data);
		$q2->bindParam(":thumb_hash", $thumb_hash);
		$q2->execute();
		die("Profile verified");
	} else {
		die("Unable to verify your profile... Please make new post (not share).");
	}
	
	$link    = "http://" . $id     . ".onion/a?t=" . "friend". "&i=" .$index . "&n=" . $count;
	$friends = json_decode(`curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s "$link"`)->items;
} else {
	die("You are already in database.");
}