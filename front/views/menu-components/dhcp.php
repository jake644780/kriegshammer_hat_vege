<div class="content" id="content5">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
        <form method="POST" action="<?php echo $controllerPATH; ?>">
        <label for="text1" class="text-label">medence neve</label>         <input type="text" id="dhcp_1" class="text-box" name="medence" maxlength="15">
        <label for="text1" class="text-label">hálózati cím</label>         <input type="text"  class="text-box" id="dhcp_2" name="network" maxlength="15">
        <label for="text2" class="text-label">hálózati maszk</label>
            <select name="mask" class="dropdown text-box">
            <option value="255.255.255.255" name="255.255.255.255">255.255.255.255</option>
        <option value="255.255.255.254" name="255.255.255.254">255.255.255.254</option>
        <option value="255.255.255.252" name="255.255.255.252">255.255.255.252</option>
        <option value="255.255.255.248" name="255.255.255.248">255.255.255.248</option>
        <option value="255.255.255.240" name="255.255.255.240">255.255.255.240</option>
        <option value="255.255.255.224" name="255.255.255.224">255.255.255.224</option>
        <option value="255.255.255.192" name="255.255.255.192">255.255.255.192</option>
        <option value="255.255.255.128" name="255.255.255.128">255.255.255.128</option>
        <option value="255.255.255.0" name="255.255.255.0">255.255.255.0</option>
        <option value="255.255.254.0" name="255.255.254.0">255.255.254.0</option>
        <option value="255.255.252.0" name="255.255.252.0">255.255.252.0</option>
        <option value="255.255.248.0" name="255.255.248.0">255.255.248.0</option>
        <option value="255.255.240.0" name="255.255.240.0">255.255.240.0</option>
        <option value="255.255.224.0" name="255.255.224.0">255.255.224.0</option>
        <option value="255.255.192.0" name="255.255.192.0">255.255.192.0</option>
        <option value="255.255.128.0" name="255.255.128.0">255.255.128.0</option>
        <option value="255.255.0.0" name="255.255.0.0">255.255.0.0</option>
        <option value="255.254.0.0" name="255.254.0.0">255.254.0.0</option>
        <option value="255.252.0.0" name="255.252.0.0">255.252.0.0</option>
        <option value="255.248.0.0" name="255.248.0.0">255.248.0.0</option>
        <option value="255.240.0.0" name="255.240.0.0">255.240.0.0</option>
        <option value="255.224.0.0" name="255.224.0.0">255.224.0.0</option>
        <option value="255.192.0.0" name="255.192.0.0">255.192.0.0</option>
        <option value="255.128.0.0" name="255.128.0.0">255.128.0.0</option>
        <option value="255.0.0.0" name="255.0.0.0">255.0.0.0</option>
        <option value="254.0.0.0" name="254.0.0.0">254.0.0.0</option>
        <option value="252.0.0.0" name="252.0.0.0">252.0.0.0</option>
        <option value="248.0.0.0" name="248.0.0.0">248.0.0.0</option>
        <option value="240.0.0.0" name="240.0.0.0">240.0.0.0</option>
        <option value="224.0.0.0" name="224.0.0.0">224.0.0.0</option>
        <option value="192.0.0.0" name="192.0.0.0">192.0.0.0</option>
        <option value="128.0.0.0" name="128.0.0.0">128.0.0.0</option>
        <option value="0.0.0.0" name="0.0.0.0">0.0.0.0</option>
            </select>
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
