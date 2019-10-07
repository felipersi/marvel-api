<?php

    class connectsmarvel
    {

     private $public_key;
     private $private_key;

        function __construct($public_key, $private_key)
        {
            $this->public_key = $public_key;
            $this->private_key = $private_key;
        }


       public function character() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $character_id = $_GET['character-id'];

        $ts = time();
        $hash = md5($ts . $this->private_key . $this->public_key);

        $query = array (
        'format' => 'comic',
        'formatType' => 'comic',
        'apikey' => $this->public_key,
        'ts' => $ts,
        'hash' => $hash,
        );

        curl_setopt($curl, CURLOPT_URL,
   "https://gateway.marvel.com:443/v1/public/characters/" . $character_id . "/comics" . "?" . http_build_query($query)
         );
        $result = json_decode(curl_exec($curl), true);

        curl_close($curl);

        echo json_encode($result);
        }

       public function creator() {
           $curl = curl_init();

           curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

           $creator_id = htmlentities(strtolower($_GET['creator-id'])); //FJEkejfdkf = fjekjfdkf

           $ts = time();
           $hash = md5($ts . $this->private_key . $this->public_key);

           $query = array(
               'apikey' => $this->public_key,
               'ts' => $ts,
               'hash' => $hash,
           );

           curl_setopt($curl, CURLOPT_URL,
               "https://gateway.marvel.com:443/v1/public/creators/" . $creator_id . "?" . http_build_query($query)
           );

           $result = json_decode(curl_exec($curl), true);

           curl_close($curl);

           echo json_encode($result);

       }

       public function namesearch() {

           $curl = curl_init();
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

           $name_to_search = htmlentities(strtolower($_GET['name'])); // HuLk == hulk

           $ts = time();
           $hash = md5($ts . $this->private_key . $this->public_key);

           $query = array(
               "name" => $name_to_search, // ""
               "orderBy" => "name",
               "limit" => "20",
               'apikey' => $this->public_key,
               'ts' => $ts,
               'hash' => $hash,
           );

           $marvel_url = 'https://gateway.marvel.com:443/v1/public/characters?' . http_build_query($query);

           curl_setopt($curl, CURLOPT_URL, $marvel_url);

           $result = json_decode(curl_exec($curl), true);

           curl_close($curl);

           echo json_encode($result);
        }

       public function singlecomic() {

           $curl = curl_init();
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

           $comic_id = htmlentities(strtolower($_GET['comic-id']));

           $ts = time();
           $hash = md5($ts . $this->private_key . $this->public_key);

           $query = array(
               'apikey' => $this->public_key,
               'ts' => $ts,
               'hash' => $hash
           );

           curl_setopt($curl, CURLOPT_URL,
               "https://gateway.marvel.com:443/v1/public/comics/" . $comic_id . "?" . http_build_query($query)
           );

           $result = json_decode(curl_exec($curl), true);

           curl_close($curl);

           echo json_encode($result);
        }
    }