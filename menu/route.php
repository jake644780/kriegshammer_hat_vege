<div class="content" id="content3">
  <div class="content-box-wrapper">
    <!-- Középső doboz -->
    <div class="center-box">
      <form action="controller.php" method="POST" class="menu-form">
        <label for="text1" class="text-label">hálózat címe</label>
        <input type="text" id="ipv4-input" class="text-box" name="network" placeholder="Enter IPv4 (e.g., 10.0.0.1)" maxlength="15">
        <label for="text2" class="text-label">hálózati maszk</label>
        <select name="mask" class="dropdown text-box">
          <?php
          require("masks.php");
          ?>
        </select><br>

        <!-- Next Hop Selection -->
        <label for="text2" class="text-label">Next Hop Type:</label>
        <fieldset class="text-box">

          <label>
            <input type="radio" name="nextHopType" value="port" checked>Port
          </label>
          <label>
            <input type="radio" name="nextHopType" value="address">Address
          </label>
        </fieldset>
        <br>

        <!-- Dynamic Next Hop Input -->
        <div id="nextHopInput">

          <select id="ports" class="dropdown text-box" name="next">;
            <?php
            for ($i = 0; $i < sizeof($_SESSION["ports"]); $i++) echo '<option name="' . $_SESSION["ports"][$i] . '" value="' . $_SESSION["ports"][$i] . '">' . $_SESSION["ports"][$i] . '</option>';
            ?>
          </select>
        </div>

        <input type="hidden" name="type" value="route">
        <input type="submit" class="continue-button" name="action" value="Tovább">

    </div>



    </form>

    <?php

    if ($_SESSION["last"] === 3) {
      echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';
      $conf = file_get_contents("output.txt");
      $snip = explode("conf t", $conf);
      echo nl2br(htmlspecialchars($snip[1]));
      echo '</p></div>';
    }

    ?>
  </div>
</div>


<script>
  /*  const ipv4Input = document.getElementById('ipv4-input');

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


  */
</script>


<script>
  document.addEventListener('DOMContentLoaded', () => {
    const nextHopTypeInputs = document.getElementsByName('nextHopType');
    const nextHopInputDiv = document.getElementById('nextHopInput');

    const renderNextHopInput = (type) => {
      if (type === 'port') {
        nextHopInputDiv.innerHTML = `
        <label for="portSelection">Next Hop Port:</label>
        <select id="ports" class="dropdown text-box" name ="next">;
            <?php
            for ($i = 0; $i < sizeof($_SESSION["ports"]); $i++) echo '<option name="' . $_SESSION["ports"][$i] . '" value="' . $_SESSION["ports"][$i] . '">' . $_SESSION["ports"][$i] . '</option>';
            ?>
        </select>
      `;
      } else if (type === 'address') {
        nextHopInputDiv.innerHTML = `
        <label for="nextHopAddress">Next Hop Address:</label>
        <input type="text" id="nextHopAddress" class="text-box" name="next" placeholder="Enter next hop address (e.g., 192.168.1.254)">
      `;
      }
    };

    // Listen for changes in the radio buttons
    nextHopTypeInputs.forEach((input) => {
      input.addEventListener('change', (e) => {
        renderNextHopInput(e.target.value);
      });
    });

    // Handle form submission
    document.getElementById('submitRoute').addEventListener('click', () => {
      const ipAddress = document.getElementById('ipAddress').value;
      const netMask = document.getElementById('netMask').value;
      const nextHopType = document.querySelector('input[name="nextHopType"]:checked').value;

      let nextHopValue;
      if (nextHopType === 'port') {
        nextHopValue = document.getElementById('portSelection').value;
      } else if (nextHopType === 'address') {
        nextHopValue = document.getElementById('nextHopAddress').value;
      }

      alert('Static route added successfully!');
    });
  });
</script>