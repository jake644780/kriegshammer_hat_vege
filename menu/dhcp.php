<div class="content" id="content5">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
        <form method="POST">
      <div class="form-group">
        <label for="range_start">Range Start</label>
        <input type="text" id="range_start" name="range_start" placeholder="e.g., 192.168.1.100" required>
      </div>
      <div class="form-group">
        <label for="range_end">Range End</label>
        <input type="text" id="range_end" name="range_end" placeholder="e.g., 192.168.1.200" required>
      </div>
      <div class="form-group">
        <label for="default_gateway">Default Gateway</label>
        <input type="text" id="default_gateway" name="default_gateway" placeholder="e.g., 192.168.1.1" required>
      </div>
      <div class="form-group">
        <label for="dns_server">DNS Server</label>
        <input type="text" id="dns_server" name="dns_server" placeholder="e.g., 8.8.8.8">
      </div>
      <div class="form-group">
        <label for="lease_time">Lease Time (in seconds)</label>
        <input type="number" id="lease_time" name="lease_time" placeholder="e.g., 86400" required>
      </div>
      <div class="form-group">
        <label for="excluded_addresses">Excluded Addresses</label>
        <div id="excluded-container" class="excluded-container">
          <input type="text" name="excluded_addresses[]" placeholder="e.g., 192.168.1.50">
        </div>
        <button type="button" class="add-button" onclick="addExcludedAddress()">Add Excluded Address</button>
      </div>
      <button type="submit">Generate Configuration</button>
    </form>
        
                <?php

            if (!($out === "") && $_SESSION["last"] ===    2){
                echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';
                $snip = explode("conf t", $out);
                echo nl2br(htmlspecialchars($snip[1]));
                echo '</p></div>';

            }
                
            ?>
    </div>
</div>

<script>
    function addExcludedAddress() {
      const excludedContainer = document.getElementById('excluded-container');
      const input = document.createElement('input');
      input.type = 'text';
      input.name = 'excluded_addresses[]';
      input.placeholder = 'e.g., 192.168.1.50';
      excludedContainer.appendChild(input);
    }
  </script>
  <style>
    

    .container {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #4caf50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background: #45a049;
    }

    .excluded-container {
      margin-bottom: 15px;
    }

    .excluded-container input {
      margin-bottom: 10px;
    }

    .excluded-container button {
      background-color: #f44336;
      margin-top: 5px;
    }

    .add-button {
      background-color: #007bff;
      margin-top: 10px;
    }
  </style>