<?php
header("Content-Type: text/plain");

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
$link    = "http://" . $id     . ".onion/a?t=" . "name". "&i=" .$index . "&n=" . $count;
echo "==== $link\n";
$username = `curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s "$link"`;
var_dump($response);
echo "====\n";
$link    = "http://" . $id     . ".onion/i?t=" . "thumb". "&i=" .$index . "&n=" . $count;
echo "==== $link\n";
var_dump(`curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s "$link"`);

$link    = "http://" . $id     . ".onion/a?t=" . "post". "&i=" .$index . "&n=" . 5;
echo "==== $link\n";
$posts = `curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s "$link"`;
var_dump($posts);

$link    = "http://" . $id     . ".onion/a?t=" . "friend". "&i=" .$index . "&n=" . $count;
echo "==== $link\n";
var_dump(`curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s "$link"`);

$link    = "http://" . $id     . ".onion/a?t=" . "info". "&i=&n=2";
echo "==== $link\n";
var_dump(`curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s "$link"`);

$link    = "http://" . $id     . ".onion/a?t=" . "photo". "&i=&n=2";
echo "==== $link\n";
var_dump(`curl --socks5 localhost:9050 --socks5-hostname localhost:9050 -s "$link"`);