<?php
session_start();
require 'vendor/autoload.php';
use phpseclib3\Net\SSH2;

/*
            <button onclick="showDiv(1)">show running</button>
            <button onclick="showDiv(2)">ip config</button>
            <button onclick="showDiv(3)">static route</button>
            <button onclick="showDiv(7)" style="background-color: blue;">Custom</button>
            <button onclick="showDiv(4)">turn on port</button>
            <button onclick="showDiv(5)">dhcp</button> 
            <button onclick="showDiv(6)">egyéb szolgáltatások</button>
*/ 

if (isset($_POST["action"])){
    $ssh = new SSH2($_SESSION["ip"]);
    
    if (!$ssh->login($_SESSION["name"], $_SESSION["pass"])){
        echo "can't log in :("; //TODO[] ERROR PAGE
        exit;
    }else{

        $in = "enable\n" . $_SESSION["pass"] . "\n" . "terminal len 0\n";
        
    switch ($_POST["type"]){
        case "show_config":
            $in .= "running-config\n";
            $_SESSION["last"] = 1;
        break;

        case "ip_config":
            $in .= "conf t \ninterface " . $_POST["port"] . "\nip address " . $_POST["address"] . " " . $_POST["mask"] . "\n";
            if (isset($_POST["felkapcs"])) $in .= "no sh\n";
            $in .= "exit\nexit\nshow ip int br\n";
            $_SESSION["last"] = 2;
        break;
        
        case "route":
            $in .="
            conf t\n
            ";
            $in .= "
            ip route " . $_POST["network"] . " " . $_POST["mask"] . " " . $_POST["next"] . "\n
            do show ip route static\n
            ";
            $_SESSION["last"] = 3;

        break;
            
        case "portCon":
            $in .= "
            conf t\n
            ";
            for($i = 0;$i < sizeof($ports); $i++){
                $in .= "
                interface" . $ports[$i] . "\n
                ";
                if (isset($_POST[$ports[$i]])) $in .= "no ";
                $in .= "
                shutdown\n
                exit\n
                ";
            }
            $in .= "
            do show ip int br\n
            ";
            $_SESSION["last"] = 4;
        break;
                
        case "dhcp":
            if (isset($_POST["medence"]) && !empty($_POST["medence"])) {
                $in .= "
                ip dhcp pool " . $_POST["medence"] . "\n
                network " . $_POST["network"] . " " . $_POST["mask"] . "\n
                ";
            }
            if (isset($_POST["def"]) && !empty($_POST["def"])){
                $in .= "
                default-router " . $_POST["def"] . "\n
                ";
            }
            if (isset($_POST["dns"]) && !empty($_POST["dns"])){
                $in .= "
                dns-server " . $_POST["dns"] . "\n
                ";
            }
            $in .= "
            exit\n
            ";
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
                    
        case "servers": //work in progress!

        break;
    }
        $ssh->write($in);
        $out = $ssh->read();
        file_put_contents('output.txt', $out);
        $ssh->reset();
        $ssh->disconnect();
        header("location: Nmenu.php");
    }
}





/*
creating a stringbuffer with absolute pontosság and then writing that one buffer in with one command

*/

       
        
        
   
?>
