<?php
require 'vendor/autoload.php';
use phpseclib3\Net\SSH2;
require("fun.php");

/*
commands:
-sh ru
-ip config on port --> fetch ports
-static routing
-turn port state --> fetch ports
-dhcp pool config
-custom
*/


if (isset($_POST["login"])){
    //catching data from login form
    $ip   = @$_POST["ip"]  ;
    $user = @$_POST["user"];
    $pass = @$_POST["pass"];
    
    try{
        $ssh = new SSH2($ip);
    }catch(Exception $e){

    }
}else if(isset($_POST["show_running"])){
}else if(isset($_POST["ip_config"])){
}else if(isset($_POST["static_route"])){
}else if(isset($_POST["turnon_port"])){
}else if(isset($_POST["dhcp"])){
}else if(isset($_POST["custom"])){

}

?>