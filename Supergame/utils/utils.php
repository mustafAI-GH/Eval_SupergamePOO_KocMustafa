<?php

    function connect(){
    return new PDO('mysql:host=127.0.0.1:3306;dbname=supergame','root','root',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}

    function sanitize(string $data):string{

        return htmlentities(strip_tags(stripslashes(trim($data))));
    }