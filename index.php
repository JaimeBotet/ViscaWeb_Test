<?php
require './vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

//  EXERCISE 3

// $url = 'https://www.sportsinteraction.com/specials/us-elections-betting';
// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// $data = curl_exec($ch);
// curl_close($ch);

//We are getting an error (403 Forbidden) using curl to get the response of a GET HTTP request to https://www.sportsinteraction.com/specials/us-elections-betting
//So I inspected the page & copied the central element of the page and paste it in /resources/sportsbet.php file
$url = './resources/sportsbet.php';
$html = file_get_contents($url);
$bets = array();

$crawler  = new Crawler($html);
//With Crawler we parse the web and get the title of the bets, the bet runner and the odd of that runner
$bet_titles  = $crawler->filter('.GameHeader__name')->each(function (Crawler $node, $i) {
    return $node->text();
});
$runners = $crawler->filter('.BetButton__runnerName')->each(function (Crawler $node, $i) {
    return $node->text();
});
$odds = $crawler->filter('.BetButton__price')->each(function (Crawler $node, $i) {
    return (float)$node->text();
});

//And we store it in $bets
foreach ($bet_titles as $title) {
    $bet = new stdClass();
    $bet->BetName = $title;
    $bet->BetOptions = array();
    for ($i = 0; $i < count($runners); $i++) {
        $option = new stdClass();
        $option->Outcome = $runners[$i];
        $option->Odds = $odds[$i];
        array_push($bet->BetOptions, $option);
    }
    array_push($bets, $bet);
}

//And create the JSON file the API should return with the desired format
$bets_json = json_encode($bets);
file_put_contents('./exercises/ex3.json', $bets_json);


echo "<pre>";
print_r($bets_json);
echo "</pre>";
