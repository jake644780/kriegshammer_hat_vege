<div class="content" id="content2">
  <div class="content-box-wrapper">
    <!-- Középső doboz -->
    <div class="center-box">
      <form action="<?php echo $controllerPATH; ?>" method="POST" class="menu-form" onsubmit="return validateForm()">
        <label for="ports" class="text-label">válassz ki egy portot:</label>
        <select id="ports" class="dropdown text-box" name="port">
          <?php
          for ($i = 0; $i < sizeof($_SESSION["ports"]); $i++) {
            echo '<option name="' . $_SESSION["ports"][$i] . '" value="' . $_SESSION["ports"][$i] . '">' . $_SESSION["ports"][$i] . '</option>';
          }
          ?>
        </select>
        <br>
        <label for="text1" class="text-label">ip cím</label>
        <input type="text" id="input2" class="text-box" name="address" placeholder="Enter IPv4 (e.g., 10.0.0.1)" maxlength="15">
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
        <label><input type="checkbox" name="felkapcs" class="text-label" value="felkapcs">port felkapcsolása</label><br>
        <input type="hidden" name="type" value="ip_config">
        <input type="submit" class="continue-button" name="action" value="Tovább" id="submitbutton2" disabled>
      </form>
    </div>

          <?php
    if ($_SESSION["last"] === 2){
                        echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';
                        $conf = file_get_contents($outputPATH);
                        $snip = explode("conf t", $conf);
                        echo nl2br(htmlspecialchars($snip[1]));
                        echo '</p></div>';

                    }

                    ?>
  </div>
</div>
