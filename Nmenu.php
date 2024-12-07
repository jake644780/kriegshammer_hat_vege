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
<div class="content" id="content1">
        <div class="content-box-wrapper">
            <!-- Középső doboz -->
            <div class="center-box">
            <form action="controller.php" method="POST">
                <label for="text1" class="text-label">beállítások megtekintése</label>
                <br>
                <input type="hidden" name="show-running">
                <input type="submit" class="continue-button" name="action" value="Tovább">
            </form>
            </div>
            <!-- Új IP beállítás doboz -->
            <div class="ip-settings-box">
                <div class="ip-title">show running-config</div>
                <div class="ip-textbox">
                Ez a parancs a router vagy switch konfigurációs fájlja aktuális állapotának megjelenítésére szolgál. A futó konfiguráció tartalmazza az összes aktív beállítást, amely jelenleg működik az eszközön.
                <br>
                Ez a parancs megjeleníti az eszköz teljes, jelenleg alkalmazott konfigurációját, beleértve a hálózati beállításokat, interfészeket, routing táblákat és más konfigurációkat.
                </div>
            </div>
            <div class="k-box">
                <div class="k-title">Kommand szintaxisa</div>
                <p>show running-config</p>
            </div>
    
            <div class="k-box">
                <div class="k-title">Kimenet</div>
                <p></p>
            </div>
        </div>
        </div>
    </div>
<!--IPCONFIG---------------------------------------------------------------------------------------------->
<div class="content" id="content2">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
        <form action="controller.php" method="POST">
        <label for="ports">válassz ki egy portot:</label>
        <select id="ports" class="dropdown" name ="port">;
           <?php
           $ports = explode(" ", $_SESSION["ports"]);
           for($i = 0; $i < sizeof($ports);$i++) echo '<option value="'. $ports[$i] .'">'. $ports[$i] .'</option>';
           ?>
        </select>
    </form>

        <input type="hidden" name="ip_config">
        <input type="submit" class="continue-button" name="action" value="Tovább">
        </div>

        <!-- IP beállítás doboz -->
        <div class="ip-settings-box">
            <div class="ip-title">IP Beállítás</div>
            <p class="ip-textbox"p>lololo</p>
        </div>

        <!-- Kommand szintaxisa doboz -->
        <div class="k-box">
            <div class="k-title">Kommand szintaxisa</div>
            <p>alma</p>
        </div>

        <div class="k-box">
            <div class="k-title">Kimenet</div>
            <p>BARNA CUKIIIIIII</p>
        </div>
    </div>
</div>
<!--STATIC ROUTE------------------------------------------------------------------------------------------>
<div class="content" id="content3">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
            <label for="text1" class="text-label">Szöveg:</label>
            <input type="text" id="text1" class="text-box">

            <label for="text2" class="text-label">Szöveg:</label>
            <input type="text" id="text2" class="text-box">

            <label for="text3" class="text-label">Szöveg:</label>
            <input type="text" id="text3" class="text-box">

            <button class="continue-button">Tovább</button>
        </div>

        <!-- IP beállítás doboz -->
        <div class="ip-settings-box">
            <div class="ip-title">IP Beállítás</div>
            <p class="ip-textbox"p>lololo</p>
        </div>

        <!-- Kommand szintaxisa doboz -->
        <div class="k-box">
            <div class="k-title">Kommand szintaxisa</div>
            <p>alma</p>
        </div>

        <div class="k-box">
            <div class="k-title">Kimenet</div>
            <p>BARNA CUKIIIIIII</p>
        </div>
    </div>
</div>
<!--TURN ON PORTS----------------------------------------------------------------------------------------->
<div class="content" id="content4">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
            <label for="text1" class="text-label">Szöveg:</label>
            <input type="text" id="text1" class="text-box">

            <label for="text2" class="text-label">Szöveg:</label>
            <input type="text" id="text2" class="text-box">

            <label for="text3" class="text-label">Szöveg:</label>
            <input type="text" id="text3" class="text-box">

            <button class="continue-button">Tovább</button>
        </div>

        <!-- IP beállítás doboz -->
        <div class="ip-settings-box">
            <div class="ip-title">IP Beállítás</div>
            <p class="ip-textbox"p>lololo</p>
        </div>

        <!-- Kommand szintaxisa doboz -->
        <div class="k-box">
            <div class="k-title">Kommand szintaxisa</div>
            <p>alma</p>
        </div>

        <div class="k-box">
            <div class="k-title">Kimenet</div>
            <p>BARNA CUKIIIIIII</p>
        </div>
    </div>
</div>
<!--DHCP-------------------------------------------------------------------------------------------------->
<div class="content" id="content5">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
            <label for="text1" class="text-label">Szöveg:</label>
            <input type="text" id="text1" class="text-box">

            <label for="text2" class="text-label">Szöveg:</label>
            <input type="text" id="text2" class="text-box">

            <label for="text3" class="text-label">Szöveg:</label>
            <input type="text" id="text3" class="text-box">

            <button class="continue-button">Tovább</button>
        </div>

        <!-- IP beállítás doboz -->
        <div class="ip-settings-box">
            <div class="ip-title">IP Beállítás</div>
            <p class="ip-textbox"p>lololo</p>
        </div>

        <!-- Kommand szintaxisa doboz -->
        <div class="k-box">
            <div class="k-title">Kommand szintaxisa</div>
            <p>alma</p>
        </div>

        <div class="k-box">
            <div class="k-title">Kimenet</div>
            <p>BARNA CUKIIIIIII</p>
        </div>
    </div>
</div>
<!--EGYÉB------------------------------------------------------------------------------------------------->
<div class="content" id="content6">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
            <label for="text1" class="text-label">Szöveg:</label>
            <input type="text" id="text1" class="text-box">

            <label for="text2" class="text-label">Szöveg:</label>
            <input type="text" id="text2" class="text-box">

            <label for="text3" class="text-label">Szöveg:</label>
            <input type="text" id="text3" class="text-box">

            <button class="continue-button">Tovább</button>
        </div>

        <!-- IP beállítás doboz -->
        <div class="ip-settings-box">
            <div class="ip-title">IP Beállítás</div>
            <p class="ip-textbox"p>lololo</p>
        </div>

        <!-- Kommand szintaxisa doboz -->
        <div class="k-box">
            <div class="k-title">Kommand szintaxisa</div>
            <p>alma</p>
        </div>

        <div class="k-box">
            <div class="k-title">Kimenet</div>
            <p>BARNA CUKIIIIIII</p>
        </div>
    </div>
</div>
<!--CUSTOM------------------------------------------------------------------------------------------------>
<div class="content" id="content7">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
            <label for="text1" class="text-label">Szöveg:</label>
            <input type="text" id="text1" class="text-box">

            <label for="text2" class="text-label">Szöveg:</label>
            <input type="text" id="text2" class="text-box">

            <label for="text3" class="text-label">Szöveg:</label>
            <input type="text" id="text3" class="text-box">

            <button class="continue-button">Tovább</button>
        </div>

        <!-- IP beállítás doboz -->
        <div class="ip-settings-box">
            <div class="ip-title">IP Beállítás</div>
            <p class="ip-textbox"p>lololo</p>
        </div>

        <!-- Kommand szintaxisa doboz -->
        <div class="k-box">
            <div class="k-title">Kommand szintaxisa</div>
            <p>alma</p>
        </div>

        <div class="k-box">
            <div class="k-title">Kimenet</div>
            <p>BARNA CUKIIIIIII</p>
        </div>
    </div>
</div>

</body>
</html>


<?php

require("menuCSS.php");

?>

<?php
require("controller.php");

?>