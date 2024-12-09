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

        break;
        
        case "route":

        break;
            
        case "portCon":
            $in .= "conf t\n";
            for($i = 0;$i < sizeof($ports); $i++){
                $in .= "interface" . $ports[$i] . "\n";
                  if (isset($_POST[$ports[$i]])) $in .= "no ";
                  $in .= "shutdown\n";
                  $in .= "exit\n";
            }
            $in .= "do show ip int br\n";
            $_SESSION["last"] = 4;
        break;
                
        case "dhcp":

        break;
                    
        case "show":

        break;
    }
        $ssh->write($in);
        $out = $ssh->read();
        file_put_contents('output.txt', $out);
        $ssh->reset();
        $ssh->disconnect();
    }
}



if (isset($_POST["show_running"])){
    $ssh = new SSH2($_SESSION["ip"]);
    if (!$ssh->login($_SESSION["name"], $_SESSION["pass"])){
        echo "no show runin";
        exit;
    }else{

        $ssh->write("enable\n");
        $ssh->write($_SESSION["pass"] . "\n");
        $ssh->write("terminal len 0\n");
        $ssh->write("show running-config\n");
        $out = $ssh->read();
        file_put_contents('output.txt', $out);
        //echo nl2br(htmlspecialchars($out));
        
    }
    $ssh->reset();
    $ssh->disconnect();
    $_SESSION["last"] = 1;
}
/*
creating a stringbuffer with absolute pontosság and then writing that one buffer in with one command

*/

?>
