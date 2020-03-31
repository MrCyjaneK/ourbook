<?php
header("Content-Type: text/plain");

$meme = json_decode(file_get_contents("https://meme-api.herokuapp.com/gimme"));
if (substr($meme->url,-4) !== ".png") {
	die("Oups! An ".substr($meme->url,-4)." (I don't like them) - plz retry");
}
$dir = "./posts/".count(glob('./posts/*'));
mkdir($dir);
file_put_contents($dir."/date.txt", time());
file_put_contents($dir."/img.png", file_get_contents($meme->url));
file_put_contents($dir."/text.txt", $meme->title."|Found on r/".$meme->subreddit."|By @memes6tco5stdgn6");