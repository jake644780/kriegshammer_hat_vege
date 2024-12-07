<?php
session_start();

require 'vendor/autoload.php';

use phpseclib3\Net\SSH2;

$ssh = new SSH2($_POST["ip"]);
if ($ssh->login($_POST["user"], $_POST["pass"])){
    echo "logged in";
    $ssh->write("enable\n");
    $ssh->write($_POST["pass"] . "\n");
    header("location: getInfo.php");
}else{
    header("location: back/error.php?error=sshCreation");
}

?>