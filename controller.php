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


session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'login':
            // Process the login action
            $ip = filter_var(trim($_POST["ip"]), FILTER_VALIDATE_IP);
            $user = htmlspecialchars(trim($_POST["user"]));
            $pass = htmlspecialchars(trim($_POST["pass"]));

            if (!$ip || empty($user) || empty($pass)) {
                // Redirect back with error if inputs are invalid
                header("Location: error.php?somethingisempty=1");
                exit;
            }

            try {
                $ssh = new SSH2($ip);
                if ($ssh->login($user, $pass)) {
                    // Store session securely
                    $_SESSION['ip'] = $ip;
                    $_SESSION['user'] = $user;
                    $_SESSION["pass"] = $pass;
                    // Redirect to menu
                    header("Location: menu.php");
                    exit;
                } else {
                    header("Location: error.php?auth=1");
                    exit;
                }
            } catch (Exception $e) {
                header("Location: error.php?somethingisfucked=1");
                exit;
            }

            break;
//<!-------------------------------------------------------------------------------------------------------->        
case "show_running":
            $ip = $_SESSION["ip"];
            $user = $_SESSION["user"];
            $pass = $_SESSION["pass"];

            try {
               $ssh = new SSH2($_SESSION["ip"]);
               if($ssh->login($user, $pass));
                
            }catch (Exception $e){
                
            }
        case "ip_config":
//<!-------------------------------------------------------------------------------------------------------->        

        case "static_route":
//<!-------------------------------------------------------------------------------------------------------->        
        case "turn_port":
//<!-------------------------------------------------------------------------------------------------------->        
        case "custom":


        // Add additional cases for other actions here
        default:
            // Handle unknown actions
            header("Location: error.php?invalid=1");
            exit;
    }
} else {
    // Redirect to login if accessed without POST
    header("Location: login.php");
    exit;
}


/*
if (isset($_POST["login"])){
    //catching data from login form
    $ip   = @$_POST["ip"]  ;
    $user = @$_POST["user"];
    $pass = @$_POST["pass"];
    $isGood = false;

    try{
        $ssh = new SSH2($ip);
        $isGood = true;
        
    }catch(Exception $e){
        jsLog("something went wronk");
    }
    
    if ($ssh->login($user, $pass)) {
        session_start();
        $_SESSION["ip"] = $ip;
        $_SESSION["user"] = $user;
        header("location: menu.php");
    } else {
        jsLog("Authentication failed");
    }

    
    if ($isGood){
        session_start();
        $_SESSION["ip"] = $ip;
        $_SESSION["user"] = $user;
        $_SESSION["pass"] = $pass;
        header("location: menu.php");
    }
}else if(isset($_POST["show_running"])){
    
}else if(isset($_POST["ip_config"])){

}else if(isset($_POST["static_route"])){
}else if(isset($_POST["turnon_port"])){
}else if(isset($_POST["dhcp"])){
}else if(isset($_POST["custom"])){

}
*/
?>


