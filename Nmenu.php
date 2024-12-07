<?php
session_start();

require 'vendor/autoload.php';

use phpseclib3\Net\SSH2;

$ssh = new SSH2($_POST["ip"]);
if ($ssh->login($_POST["user"], $_POST["pass"])){
    echo "yes";
    $ssh->write("enable\n");
    $ssh->write($_POST["pass"] . "\n");
    if ($ssh->write("sh ip int br\n")) echo "br\n";
    $out = $ssh->read();
    echo $out;
    $split1 = explode("sh ip int br", $out);
    $split2 = explode("\n", $split1[1]);
    $ports = [];
    for($i = 2; $i < sizeof($split2)-1;$i++){
        $line = explode(" ", $split2[$i]);
        $ports[] = $line[0];
    }
        echo (implode(",", $ports));
        
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
            <button onclick="showDiv(4)">turn on port</button>
            <button onclick="showDiv(5)">dhcp</button>
            <button onclick="showDiv(6)">egyéb szolgáltatások</button>
            <button onclick="showDiv(7)">Custom</button>
        </div>
    </div>

    <!-- Tartalom helye -->
<!--SHOW RUNNING------------------------------------------------------------------------------------------>
<?php
require("menu/show.php");
?>
<!--IPCONFIG---------------------------------------------------------------------------------------------->
<?php
require("menu/ipconfig.php");
?>
<!--STATIC ROUTE------------------------------------------------------------------------------------------>
<?php
require("menu/route.php");
?>
<!--TURN ON PORTS----------------------------------------------------------------------------------------->
<?php
require("menu/port.php");
?>
<!--DHCP-------------------------------------------------------------------------------------------------->
<?php
require("menu/dhcp.php");
?>
<!--EGYÉB------------------------------------------------------------------------------------------------->
<?php
require("menu/egyeb.php");
?>
<!--CUSTOM------------------------------------------------------------------------------------------------>
<?php
require("menu/custom.php");
?>
</body>
</html>


<?php

require("menuCSS.php");

?>

<?php
require("controller.php");

?>