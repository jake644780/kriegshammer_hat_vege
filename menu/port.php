<div class="content" id="content4">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="container">


        <form method="POST">
        <label for="text1" class="text-label">Portok</label>
<?php
    for ($i = 0; $i < count($ports); $i++) {
          echo '
          <div class="port-row">
            <span class="port-name">' . $ports[$i] . '</span>
            <label class="switch">
              <input type="checkbox" name="' . $ports[$i] . '">
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

if (!($out === "") && $_SESSION["last"] ===    4){
    echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';
    $snip = explode("conf t", $out);
    echo nl2br(htmlspecialchars($snip[1]));
    echo '</p></div>';

}
    
?>
        
    </div>
</div>
<style>
 
    .container {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    .port-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }

    .port-name {
      font-weight: bold;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 34px;
      height: 20px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: 0.4s;
      border-radius: 20px;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 14px;
      width: 14px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: 0.4s;
      border-radius: 50%;
    }

    input:checked + .slider {
      background-color: #4caf50;
    }

    input:checked + .slider:before {
      transform: translateX(14px);
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
  </style>
