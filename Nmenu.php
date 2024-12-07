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
            <button onclick="showDiv(4)">turn on port</button>
            <button onclick="showDiv(5)">dhcp</button>
            <button onclick="showDiv(6)">egyéb szolgáltatások</button>
            <button onclick="showDiv(7)">Custom</button>
        </div>
    </div>

<!-- Tartalom helye -->
<?php

require("menu/show.php");       //TODO[x]
require("menu/ipconfig.php");   //TODO[]
require("menu/route.php");      //TODO[]
require("menu/port.php");       //TODO[]
require("menu/dhcp.php");       //TODO[]
require("menu/egyeb.php");      //TODO[]
require("menu/custom.php");     //TODO[]
?>
</body>
</html>


<?php

require("styles/menuCSS.php");

if (isset($_SESSION["last"])){
    echo "<script>showDiv(". $_SESSION["last"] .")</script>";

}


?>