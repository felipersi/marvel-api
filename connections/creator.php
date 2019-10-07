<?php

include_once('../model/ClassConnectsMarvel.php');
include_once('../configapi.php');

$conectaAPI = new connectsmarvel($public_key, $private_key);

    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
        if (isset($_GET['creator-id'])) {

          $conectaAPI->creator();

        } else {
            echo "Ops... o ID do criador não esta definido";
        }

        } else {
            echo "Error: Falha do servidor";
    }
