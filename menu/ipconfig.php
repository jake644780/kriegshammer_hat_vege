<div class="content" id="content2">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
        <form action="Nmenu.php" method="POST" class="menu-form">
        <label for="ports" class="text-label">válassz ki egy portot:</label>
        <select id="ports" class="dropdown text-box" name ="port">;
            <?php
            for($i = 0; $i < sizeof($ports);$i++) echo '<option value="'. $ports[$i] .'">'. $ports[$i] .'</option>';
           ?>
        </select>
        <br>
        <label for="text1" class="text-label">ip cím</label>
        <input type="text" id="ipv4-input" class="text-box" placeholder="Enter IPv4 (e.g., 10.0.0.1)" maxlength="15">
            <label for="text2" class="text-label">hálózati maszk</label>
            <select name="mask" class="dropdown text-box">
            <?php
            require("masks.php");
            ?>
            </select>
        <input type="hidden" name="ip_config">
        <input type="submit" class="continue-button" name="action" value="Tovább">
        </div>
    </form>
        <div class="k-box">
            <div class="k-title">Kimenet</div>
            <p>BARNA CUKIIIIIII</p>
        </div>
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