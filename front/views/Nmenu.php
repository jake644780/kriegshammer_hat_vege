<?php
session_start();
require "../../vendor/autoload.php";

use phpseclib3\Net\SSH2;

$controllerPATH = "../../back/controller/controller.php";
$outputPATH = "../../back/texts/output.txt";

if (isset($_POST["name"]) && isset($_POST["pass"]) && isset($_POST["ip"])) {
    $_SESSION["ip"] = $_POST["ip"];
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["pass"] = $_POST["pass"];
}
try {
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
                    $protocol = $matches[5];
                }
                $_SESSION["ports"][] = $interface;
                $_SESSION["portStatus"][] = $protocol;
            }
        } else $split2 = $split1;




        $ssh->reset();
        $ssh->disconnect();
        $out = "";
    } else {
        echo "no";
        exit;
    }
} catch (Exception $e) {
    file_put_contents("error.txt", $e);
    header("location: error.php?error=login");
}


?>

<script src="../scripts/menuBefore.js"></script>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új Oldal</title>
    <link rel="stylesheet" href="../styles/menu.css">
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
            <button class="butto" id="butto1" onclick="showDiv(1)">show running</button>
            <button class="butto" id="butto2" onclick="showDiv(2)">ip config</button>
            <button class="butto" id="butto3" onclick="showDiv(3)">static route</button>
            <button class="butto" id="butto4" onclick="showDiv(4)">turn on port</button>
            <button class="butto" id="butto5" onclick="showDiv(5)">dhcp</button>
            <button class="butto" id="butto6" onclick="showDiv(6)">egyéb</button>
            <button class="butto" id="butto7" onclick="showDiv(7)">Custom</button>

        </div>
    </div>

    <?php

    sleep(1);

    require("../views/menu-components/show.php");
    require("../views/menu-components/ipconfig.php");
    require("../views/menu-components/route.php");
    require("../views/menu-components/port.php");
    require("../views/menu-components/dhcp.php");
    require("../views/menu-components/egyeb.php");
    require("../views/menu-components/custom.php");


    ?>
</body>

</html>

<script src="../scripts/menuAfter.js"></script>

<?php


if (isset($_SESSION["last"])) echo "<script>showDiv(" . $_SESSION["last"] . ")</script>";

?>