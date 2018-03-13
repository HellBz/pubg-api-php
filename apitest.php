<?php

require_once('pubg-api.php');

$debug = true;
$result = true; // assoc
$apikey = '';
$pubg = new PubgWrapper($apikey, $result, $debug);


// api status
print_r($pubg->status());



// get match shards
/* Plataforms : xbox-as - Asia  : xbox-eu - Europe : xbox-na - North America : xbox-oc - Oceania : pc-krjp - Korea/Japan : pc-na - North America : pc-eu - Europe :pc-oc - Oceania :  pc-kakao :  pc-sea - South East Asia : pc-sa - South and Central America :  pc-as - Asia */
$plataform = 'pc-sa';
$sort = '-createdAt';
$limit = 5;
$offset = 0;
$filter_start = date(DateTime::ISO8601);
$filter_end = date(DateTime::ISO8601);
$player_ids = array('76561198078739619');
$game_mode = 'squad'; // solo,squad ...
print_r($pubg->matches($plataform,$sort,$limit,$offset,$filter_start,$filter_end,$player_ids,$game_mode));



// get match by id

$plataform = 'pc-sa';
$gameid = '00000000-0000-0000-0000-000000000000';
print_r($pubg->get_match_by_id($plataform,$gameid));

?>
