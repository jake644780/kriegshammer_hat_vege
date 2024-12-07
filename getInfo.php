<?php
session_start();

require 'vendor/autoload.php';

use phpseclib3\Net\SSH2;

$ssh = new SSH2($_SESSION["ip"]);
if ($ssh->login($_SESSION["user"], $_SESSION["pass"])){
    $ssh->write("enable\n");
    $ssh->write($_SESSION["pass"] . "\n");
    $ssh->write("sh ip int br");
    $out = $ssh->read();
    $split1 = explode("sh ip int br", $out);
    $split2 = explode("\n", $split1[1]);
    $ports = "";
    for($i = 2; $i < sizeof($split2)-1;$i++){
        $line = explode(" ", $split2[$i]);
        $ports .= $line[0];
        $ports .= " ";
    }
    $_SESSION["port"] = $ports;
    header("location: Nmenu.php");
}


?>