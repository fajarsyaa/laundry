<?php

    if (!empty($_SESSION["data"])) {
        if(empty($_SESSION["data"]["url_to_delete"])){
            $_SESSION["data"]["url_to_delete"] = this_url();
        }else{
            // pre($_SESSION["data"]["url_to_delete"] != this_url());
            if($_SESSION["data"]["url_to_delete"] != this_url()){
                // unset($_SESSION["data"]);
            }
        }

        if(!empty($_SESSION["data"])){
            $sessionData = $_SESSION["data"];
            
            foreach ($sessionData as $key => $value) {
                ${$key} = json_decode(json_encode($value));
            }   
        }
    }