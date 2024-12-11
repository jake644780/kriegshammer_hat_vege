<?php
session_start();
require 'vendor/autoload.php';
use phpseclib3\Net\SSH2;

if (isset($_POST["action"])){
    $ssh = new SSH2($_SESSION["ip"]);
    
    if (!$ssh->login($_SESSION["name"], $_SESSION["pass"])){
        echo "can't log in :("; //TODO[] ERROR PAGE
        exit;
    }else{

        $in = "enable\n" . $_SESSION["pass"] . "\n" . "terminal len 0\n";
        
    switch ($_POST["type"]){
        case "show_running":
            $in .= "show running-config\n";
            $_SESSION["last"] = 1;
            break;

        case "ip_config":
            $in .= "conf t \ninterface " . $_POST["port"] . "\nip address " . $_POST["address"] . " " . $_POST["mask"] . "\n";
            if (isset($_POST["felkapcs"])) $in .= "no sh\n";
            $in .= "exit\nexit\nshow ip int br\n";
            $_SESSION["last"] = 2;
            break;
        
        case "route":
            $in .="conf t\n";
            $in .= "ip route " . $_POST["network"] . " " . $_POST["mask"] . " " . $_POST["next"] . "\ndo show ip route static\n";
            $_SESSION["last"] = 3;

            break;
            
        case "portCon":
            $in .= "
            conf t\n
            ";
            for($i = 0;$i < count($_SESSION["ports"]); $i++){
                $in .= "interface " . $_SESSION["ports"][$i] . "\n";
                if (isset($_POST[$_SESSION["ports"][$i]])) $in .= "no ";
                $in .= "shutdown\nexit\n";
            }
            $in .= "do show ip int br\n";
            $_SESSION["last"] = 4;
            break;
                
        case "dhcp":
            if (isset($_POST["medence"]) && !empty($_POST["medence"])) {
                $in .= "conf t\nip dhcp pool " . $_POST["medence"] . "\nnetwork " . $_POST["network"] . " " . $_POST["mask"] . "\n";
            }
            if (isset($_POST["def"]) && !empty($_POST["def"])){
                $in .= "default-router " . $_POST["def"] . "\n";
            }
            if (isset($_POST["dns"]) && !empty($_POST["dns"])){
                $in .= "dns-server " . $_POST["dns"] . "\n";
            }
            $in .= "exit\n";
            if (isset($_POST["excluded_addresses"]) && !empty($_POST["excluded_addresses"])) { 
                for ($i = 0; $i < sizeof($_POST["excluded_addresses"]); $i++) {
                    if (!empty($_POST["excluded_addresses"][$i])) {
                        $in .= "ip dhcp excluded-address " . $_POST["excluded_addresses"][$i] . "\n";
                    }
                }
            }

            
            $in .= "
            do sh ip dhcp pool\n
            ";
            
            

            
            $_SESSION["last"] = 5;
            break;
                    
        case "egyeb": 
            $in .= "conf t\n";
            switch ($_POST["service"]){
                case "ntp":
                    $in .= "ntp server " . $_POST["ip"] . "\n";
                    break;
                case "syslog":
                    $in .= "logging " . $_POST["ip"] . "\n";
                    break;
                case "dns":
                    $in .= "ip domain-lookup\n ip name-server " . $_POST["ip"];
                    break;
                case "dhcp":
                    $in .= "ip helper-address " . $_POST["ip"];
            }
            $_SESSION["last"] = 6;
            break;
        case "custom":
            break;

    }
        $ssh->write($in);
        $out = $ssh->read();
        file_put_contents('output.txt', $out);
        $ssh->write("end\nwrite\n");
        $ssh->reset();
        $ssh->disconnect();
        header("location: Nmenu.php");
    }
}





/*
creating a stringbuffer with absolute pontosság and then writing that one buffer in with one command

*/

       
        
        
   
?>
