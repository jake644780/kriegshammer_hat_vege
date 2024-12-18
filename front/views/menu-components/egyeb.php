<div class="content" id="content6">
  <div class="content-box-wrapper">
    <!-- Középső doboz -->
    <div class="center-box">
      <form action="<?php echo $controllerPATH; ?>" method="POST">
        <label for="service-select">válassz egy szolgáltatást</label>
        <select id="service-select" class="dropdown text-box" name="service">
          <option value="ntp"> NTP</option>
          <option value="syslog"> Syslog</option>
          <option value="dns"> DNS</option>
          <option value="dhcp"> DHCP</option>
        </select>
        <label for="text1" class="text-label">cím</label>
        <input type="text" id="input6" class="text-box" name="ip" placeholder="Enter IPv4 (e.g., 10.0.0.1)" maxlength="15">
        <input type="hidden" name="type" value="egyeb">
        <br>
        <br>
        <input type="submit" id="submitbutton6" class="continue-button" name="action" value="Tovább" disabled>
      </form>
    </div>

    <?php
    if ($_SESSION["last"] === 6) {
      echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';
      $conf = file_get_contents($outputPATH);
      $snip = explode("conf t", $conf);
      echo nl2br(htmlspecialchars($snip[1]));
      echo '</p></div>';
    }
    ?>
  </div>
</div>