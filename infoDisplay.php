<?php

$url = 'http://localhost/cricketScoreWebService/info.php';
$content = file_get_contents($url);
$json = json_decode($content, true);

foreach($json['score'] as $item) {
    echo  "Run is ".$item['run'];
    echo '<br>';
    echo  "Wicket ".$item['wicket'];
    echo '<br>';
    echo  "Overs ".$item['overs'];
}