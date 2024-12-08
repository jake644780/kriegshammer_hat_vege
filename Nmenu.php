<?php
session_start();
require 'vendor/autoload.php';

use phpseclib3\Net\SSH2;

echo $_SESSION["last"];

if (isset($_POST["name"]) && isset($_POST["pass"]) && isset($_POST["ip"])) {
    $_SESSION["ip"] = $_POST["ip"];
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["pass"] = $_POST["pass"];
}

//port grabbing at the beninging
$ssh = new SSH2($_SESSION["ip"]);
$ssh->setTimeout(30);

if ($ssh->login($_SESSION["name"], $_SESSION["pass"])) {

    $fetchPorts = "enable\n" . $_SESSION["pass"] . "\nsh ip int br\n";
    $ssh->write($fetchPorts);
    $out = $ssh->read();
    $split1 = explode("sh ip int br", $out);
    if (sizeof($split1) > 1) {

        $split2 = explode("\n", $split1[1]);
        $_SESSION["ports"] = [];
        $_SESSION["portStatus"] = [];
        for ($i = 2; $i < sizeof($split2) - 1; $i++) {
            $pattern = '/(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(\S+(?:\s+\S+)?)/';

            if (preg_match($pattern, $split2[$i], $matches)) {
                $interface = $matches[1]; 
                $ipAddress = $matches[2]; 
                $method = $matches[3];    
                $status = $matches[4];    
                $protocol = $matches[5];  
            }
            $_SESSION["ports"][] = $interface;
            $_SESSION["portStatus"][] = $protocol;
        }
        //echo (implode(",", $_SESSION["ports"]));
    } else $split2 = $split1;
    $ssh->reset();
    $ssh->disconnect();
    $out = "";
} else {
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
            <button onclick="showDiv(7)" style="background-color: blue;">Custom</button>
            <button onclick="showDiv(4)">turn on port</button>
            <button onclick="showDiv(5)">dhcp</button>
            <button onclick="showDiv(6)">egyéb szolgáltatások</button>

        </div>
    </div>

    <!-- Tartalom helye -->
    <?php

    sleep(1);

    require("menu/show.php");       //TODO[x]
    require("menu/ipconfig.php");   //TODO[x]
    require("menu/route.php");      //TODO[x]
    require("menu/port.php");       //TODO[x]
    require("menu/dhcp.php");       //TODO[x]
    require("menu/egyeb.php");      //TODO[]
    require("menu/custom.php");     //TODO[]
    /*
TODO[x] create controller.php
TODO[x] implement switchcase system
TODO[x] file writing output 
TODO[x] redirecting back($_SESSION["status"])
TODO[] error pages
TODO[x]port states into the portCon
TODO[]input checking on frontend
TODO[]virtual ajax terminal
*/
    ?>
</body>

</html>


<?php

require("styles/menuCSS.php");

if (isset($_SESSION["last"])) {
    echo "<script>showDiv(" . $_SESSION["last"] . ")</script>";
}

// if (isset($_POST["dhcp"])){
//     $ssh = new SSH2($_SESSION["ip"]);
//     if (!$ssh->login($_SESSION["name"], $_SESSION["pass"])){
//         echo "no ip config";
//         exit;
//     }else{

//         $ssh->write("enable\n");
//         $ssh->write($_SESSION["pass"] . "\n");
//         $ssh->write("terminal len 0\n");
//         $ssh->write("conf t\n");

//         if (isset($_POST["medence"]) && !empty($_POST["medence"])) {
//             $ssh->write("ip dhcp pool " . $_POST["medence"] . "\n");
//             $ssh->write("network " . $_POST["network"] . " " . $_POST["mask"] . "\n");

//             if (isset($_POST["def"]) && !empty($_POST["def"])) {
//                 $ssh->write("default-router " . $_POST["def"] . "\n");
//             }
//             if (isset($_POST["dns"]) && !empty($_POST["dns"])) {
//                 $ssh->write("dns-server " . $_POST["dns"] . "\n");
//             }

//             $ssh->write("exit\n");
//         }

//         if (isset($_POST["excluded_addresses"]) && !empty($_POST["excluded_addresses"])) { 
//             for ($i = 0; $i < sizeof($_POST["excluded_addresses"]); $i++) {
//                 if (!empty($_POST["excluded_addresses"][$i])) {
//                     $ssh->write("ip dhcp excluded-address " . $_POST["excluded_addresses"][$i] . "\n");
//                 }
//             }
//         }

//         $out = $ssh->read();
//         $ssh->reset();
//         $ssh->disconnect();
//         $_SESSION["last"] = 5;

//     }  
//     }

?>