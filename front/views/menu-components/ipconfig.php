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
          <?php require("masks.php"); ?>
        </select><br>
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
