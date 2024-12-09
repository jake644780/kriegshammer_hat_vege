<div class="content" id="content2">
  <div class="content-box-wrapper">
    <!-- Középső doboz -->
    <div class="center-box">
      <form action="controller.php" method="POST" class="menu-form">
        <label for="ports" class="text-label">válassz ki egy portot:</label>
        <select id="ports" class="dropdown text-box" name="port">;
          <?php
          for ($i = 0; $i < sizeof($_SESSION["ports"]); $i++) echo '<option name="' . $_SESSION["ports"][$i] . '" value="' . $_SESSION["ports"][$i] . '">' . $_SESSION["ports"][$i] . '</option>';
          ?>
        </select>
        <br>
        <label for="text1" class="text-label">ip cím</label>
        <input type="text" id="ipv4-input" class="text-box" name="address" placeholder="Enter IPv4 (e.g., 10.0.0.1)" maxlength="15">
        <label for="text2" class="text-label">hálózati maszk</label>
        <select name="mask" class="dropdown text-box">
          <?php
          require("masks.php");
          ?>
        </select><br>
        <label><input type="checkbox" name="felkapcs" class="text-label" value="felkapcs">port felkapcsolása</label><br>
        <input type="hidden" name="type" value="ip_config">
        <input type="submit" class="continue-button" name="action" value="Tovább">
    </div>
    </form>

    <?php

    if ($_SESSION["last"] === 2) {
      echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';

      $conf = file_get_contents("output.txt");
      $snip = explode("conf t", $conf);
      echo nl2br(htmlspecialchars($snip[1]));
      echo '</p></div>';

      /*
  TODO[] table of ints
  $_SESSION["ports"]_for_tables = [];
  $lines = explode("\n",$snip[1]);
  for ($i = 0; $i < count($lines); $i++) if (preg_match('^(\S+)\s+(\S+)\s+(YES|NO)\s+(\S+)\s+(\S+.*\S)\s+(up|down)$', $lines[$i])) $_SESSION["ports"]_for_tables[] = $lines[$i];
  */

      // Split $snip into lines and capture port lines

    }



    ?>
  </div>
</div>



<script>
  const ipv4Input = document.getElementById('ipv4-input');

  ipv4Input.addEventListener('input', () => {
    const cursorPosition = ipv4Input.selectionStart; // Save cursor position
    let value = ipv4Input.value;

    // Allow only numbers and dots
    value = value.replace(/[^\d.]/g, '');

    // Split into octets
    const octets = value.split('.').map((octet) => octet.slice(0, 3)); // Limit each part to 3 digits

    // Rejoin to form the full IP address
    ipv4Input.value = octets.join('.');

    // Adjust cursor position to maintain a natural typing experience
    ipv4Input.setSelectionRange(cursorPosition, cursorPosition);
  });

  ipv4Input.addEventListener('keydown', (event) => {
    // Prevent entering multiple dots in a row
    if (event.key === '.' && ipv4Input.value.endsWith('.')) {
      event.preventDefault();
    }
  });
</script>