<?php
session_start();

require 'vendor/autoload.php';

$_SESSION["output"] = "alma";

use phpseclib3\Net\SSH2;
    if (isset($_POST["name"]) && isset($_POST["pass"]) && isset($_POST["ip"])){
        $_SESSION["ip"] = $_POST["ip"];
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["pass"] = $_POST["pass"];

        
    }

//port grabbing at the beninging
$ssh = new SSH2($_SESSION["ip"]);
if ($ssh->login($_SESSION["name"], $_SESSION["pass"])){
    $ssh->setTimeout(30);

    $ssh->write("enable\n");
    $ssh->write($_SESSION["pass"] . "\n");
    if ($ssh->write("sh ip int br\n")) echo "br\n";
    $out = $ssh->read();
    //echo $out;
    $split1 = explode("sh ip int br", $out);
    if (sizeof($split1) > 1){

        $split2 = explode("\n", $split1[1]);
        $ports = [];
        for($i = 2; $i < sizeof($split2)-1;$i++){
            $line = explode(" ", $split2[$i]);
            $ports[] = $line[0];
        }
            echo (implode(",", $ports));
    }else $split2 = $split1;
        $ssh->reset();
        $ssh->disconnect();
        $out="";
        
}else {
    echo "no";
    exit;
}
   





?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új Oldal</title>
</head>
<body class="banan">
    <!-- Két részre osztott felső sáv -->
    <div class="dual-bar">
        <div class="upper-bar">
            <div class="team-container">
                <div class="team-name">Kriegshammer</div>
            </div>
            <div class="menu-title">Menü</div>
        </div>
        <div class="lower-bar">
            <button onclick="showDiv(1)">show running</button>
            <button onclick="showDiv(2)">ip config</button>
            <button onclick="showDiv(3)">static route</button>
            <button onclick="showDiv(7)">Custom</button>
            <button onclick="showDiv(4)">turn on port</button>
            <button onclick="showDiv(5)">dhcp</button> 
            <button onclick="showDiv(6)">egyéb szolgáltatások</button>
           
        </div>
    </div>

<!-- Tartalom helye -->
<?php

//controller for sh ru
sleep(1);
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
require("menu/show.php");       //TODO[x]
if (isset($_POST["ip_config"])){
    $ssh = new SSH2($_SESSION["ip"]);
    if (!$ssh->login($_SESSION["name"], $_SESSION["pass"])){
        echo "no ip config";
        exit;
    }else{

        $ssh->write("enable\n");
        $ssh->write($_SESSION["pass"] . "\n");
        $ssh->write("terminal len 0\n");
        $ssh->write("conf t\n");
        $ssh->write("interface " . $_POST["port"] . "\n");
        $ipConfig = "ip address " . $_POST["address"] . " " . $_POST["mask"] . "\n";
        $ssh->write($ipConfig);
        if (isset($_POST["felkapcs"])){
            $ssh->write("no sh\n");
        }
        $out = $ssh->read();
        
        $ssh->reset();
        $ssh->disconnect();
        $_SESSION["last"] = 2;
    }

}
require("menu/ipconfig.php");   //TODO[x]
if (isset($_POST["route"])){
    $ssh = new SSH2($_SESSION["ip"]);
    if (!$ssh->login($_SESSION["name"], $_SESSION["pass"])){
        echo "no ip config";
        exit;
    }else{

        $ssh->write("enable\n");
        $ssh->write($_SESSION["pass"] . "\n");
        $ssh->write("terminal len 0\n");
        $ssh->write("conf t\n");
        $ssh->write("ip route " . $_POST["network"] . " " . $_POST["mask"] . $_POST["next"] . "\n"); 
        $ssh->write($ipConfig);
        if (isset($_POST["felkapcs"])){
            $ssh->write("no sh\n");
        }
        $out = $ssh->read();
        
        $ssh->reset();
        $ssh->disconnect();
        $_SESSION["last"] = 3;
    }
}
require("menu/route.php");      //TODO[]
require("menu/port.php");       //TODO[]
require("menu/dhcp.php");       //TODO[]
require("menu/egyeb.php");      //TODO[]
require("menu/custom.php");     //TODO[]
//TODO kimenet csak ha az volt a legutolso

?>
</body>
</html>


<?php

require("styles/menuCSS.php");

if (isset($_SESSION["last"])){
    echo "<script>showDiv(". $_SESSION["last"] .")</script>";

}


?>