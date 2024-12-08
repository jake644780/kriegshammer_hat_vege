<div class="content" id="content5">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
        <form method="POST">
        <label for="text1" class="text-label">tartomány kezdete</label><input type="text"  class="text-box" name="start" maxlength="15">
        <label for="text1" class="text-label">tartomány vége</label><input type="text"  class="text-box" name="end" maxlength="15">
        <label for="text1" class="text-label">alapértelmezett átjáró</label><input type="text"  class="text-box" name="def" maxlength="15">
        <label for="text1" class="text-label">dns szerver</label><input type="text"  class="text-box" name="dns" maxlength="15">
        <label for="text1" class="text-label">kitiltott címek</label>
        <div id="excluded-container" class="excluded-container">
          <input type="text" name="excluded_addresses[]" placeholder="e.g., 192.168.1.50">
        </div>
        <button type="button" class="add-button" onclick="addExcludedAddress()">Add Excluded Address</button>
        
        <input type="hidden" name="route">
        <input type="submit" class="continue-button" name="action" value="Tovább">

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