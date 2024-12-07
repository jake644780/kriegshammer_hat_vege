<?php

echo $_SESSION["ip"];
echo "<br>";
echo $_SESSION["user"];
echo "<br>";
echo $_SESSION["pass"];





    if ($ssh->login($_SESSION["user"], $_SESSION["pass"])){
        $ssh->write("enable\n");
        $ssh->write($_SESSION["pass"] . "\n");
        //getting ports
        $ssh->write("sh ip int brief\n");
        $out = $ssh->read();
        //
        $splitInTwo = explode("sh ip int brief", $out);
        $interfacesWithEnd = explode("\n", $splitInTwo[1]);
        $ports = [];
        //starting at 2 and ending 1 before to not add lines around ports
        for($i = 2; $i < sizeof($interfacesWithEnd)-1; $i++){
                $line = explode(" ", $interfacesWithEnd[$i]);
                $ports[] = $line[0];
                $isGood = 1;
        }
    }else{
        echo "no";
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
                <label for="text1" class="text-label">show running</label>
                <br>
                <input type="hidden" name="show-running">
                <input type="submit" class="continue-button" name="action" value="Tovább">
            </form>
            </div>
            <!-- Új IP beállítás doboz -->
            <div class="ip-settings-box">
                <div class="ip-title">Ip beállítás</div>
                <div class="ip-textbox">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod velit facere obcaecati amet? Unde earum eos reiciendis mollitia quod animi. Magni, consectetur corrupti. Alias, deleniti distinctio doloremque illum molestias fuga.</div>
            </div>
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


<script>
    function showDiv(divNumber) {
        // Get all div elements with the class "content"
        const divs = document.querySelectorAll('.content');
        
        // Hide all divs
        divs.forEach(div => {
            div.style.display = 'none';
        });
    
        // Show the selected div
        const selectedDiv = document.getElementById(`content${divNumber}`);
        if (selectedDiv) {
            selectedDiv.style.display = 'flex';
        }
    }
    
    
    </script>
<?php
   require("menuCSS.php");

?>