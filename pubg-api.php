<?php
class PubgWrapper {
    protected $accessToken;
    protected $debug = false;
    protected $assoc = false;

    public function __construct($accessToken, $assoc=false, $debug=false){
        $this->accessToken = $accessToken;
        $this->assoc = $assoc;
        $this->debug = $debug;
    }


    public function debugOn() {
        $this->debug = true;
    }

    public function debugOff()  {
        $this->debug = false;
    }


    //all methods return assosiactive arrays

    public function returnAssoc(){
        $this->assoc = true;
    }

    //all methods return array


    public function returnObject(){
        $this->assoc = false;
    }


    private function sendRequest($path, $method, $body=null) {
        if ($this->debug) {
            echo "PUBG Request : $path  Method:  $method   Body:  $body \n";
        }

        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, "https://api.playbattlegrounds.com/".$path);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        if ($body) {
            curl_setopt($request, CURLOPT_POST, true);
            curl_setopt($request, CURLOPT_POSTFIELDS, $body);
        }
        curl_setopt($request, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($request, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $this->accessToken, 'Accept: application/vnd.api+json'));
        $responseBody = curl_exec($request);
        if ($this->debug) {
            echo "PUBG REquest : $responseBody \n";
        }
            return json_decode($responseBody, $this->assoc);
    }

    public function status(){
       return $this->sendRequest("status", 'GET');
    }

    public function matches($plataform,$sort = 'createdAt',$limit = 5,$offset = 0,$filter_start,$filter_end,$player_ids,$game_mode) {
      $player_ids = implode(',',$player_ids);
      return $this->sendRequest("shards/$plataform/matches?sort=$sort&page[limit]=$limit&page[offset]=$offset&filter[createdAt-start]=$filter_start&filter[createdAt-end]=$filter_end&filter[playerIds]=$player_ids&filter[gameMode]=$game_mode",'GET');
    }


    public function get_match_by_id($plataform,$id) {
      return $this->sendRequest("shards/$plataform/matches/$id",'GET');
    }



}
