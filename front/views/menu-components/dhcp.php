<div class="content" id="content5">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
        <form method="POST" action="<?php echo $controllerPATH; ?>">
        <label for="text1" class="text-label">medence neve</label>         <input type="text" id="dhcp_1" class="text-box" name="medence" maxlength="15">
        <label for="text1" class="text-label">hálózati cím</label>         <input type="text"  class="text-box" id="dhcp_2" name="network" maxlength="15">
        <label for="text2" class="text-label">hálózati maszk</label>
            <select name="mask" class="dropdown text-box">
            <?php
            require("masks.php");
            ?>
            </select><br>
        <label for="text1" class="text-label">alapértelmezett átjáró</label>    <input type="text" id="dhcp_3"  class="text-box" name="def" maxlength="15">
        <label for="text1" class="text-label">dns szerver</label>               <input type="text" id="dhcp_4" class="text-box" name="dns" maxlength="15">
        <label for="text1" class="text-label">kitiltott címek</label>
        <div id="excluded-container" class="excluded-container">
          <input type="text" class="text-label" name="excluded_addresses[]" placeholder="e.g., 192.168.1.50">
        </div>
        <button type="button" class="add-button" onclick="addExcludedAddress()">Add Excluded Address</button>

        <input type="hidden" name="type" value="dhcp">
        <br>
        <div class="centerer"><input type="submit" class="continue-button centered" name="action" id="dhcpsubmit" value="Tovább"></div>
        <br>
        </div>

    </form>
        
                <?php

            if ($_SESSION["last"] === 5){
                echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';
                $conf = file_get_contents($outputPATH);
                $snip = explode("conf t", $conf);
                echo nl2br(htmlspecialchars($snip[1]));
                echo '</p></div>';

            }
                
            ?>
    </div>
</div>
