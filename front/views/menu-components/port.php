<div class="content" id="content4">
  <div class="content-box-wrapper">
    <!-- Középső doboz -->
    <div class="container">


      <form method="POST" action="<?php echo $controllerPATH; ?>">
        <label for="text1" class="text-label">Portok</label>
        <?php
        for ($i = 0; $i < count($_SESSION["ports"]); $i++) {
          // Set the checkbox to be checked if the port is up
          $checked = ((strpos($_SESSION["portStatus"][$i], "up") !== false)) ? "checked" : ""; // Assuming "up" indicates the port is active

          echo '
          <div class="port-row">
              <span class="port-name">' . $_SESSION["ports"][$i] . '</span>
              <label class="switch">
                  <input type="checkbox" name="' . $_SESSION["ports"][$i] . '" ' . $checked . '>
                  <span class="slider"></span>
              </label>
              
          </div>';
        }


        ?>

        <input type="hidden" name="type" value="portCon">
        <input type="submit" class="continue-button" name="action" value="Tovább">
      </form>
    </div>


    <?php

    if ($_SESSION["last"] === 4) {
      echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';
      $conf = file_get_contents($outputPath);
      $snip = explode("conf t", $conf);
      echo nl2br(htmlspecialchars($snip[1]));
      echo '</p></div>';
    }

    ?>

  </div>
</div>