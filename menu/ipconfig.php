<div class="content" id="content2">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
        <form action="controller.php" method="POST">
        <label for="ports">válassz ki egy portot:</label>
        <select id="ports" class="dropdown" name ="port">;
           <?php
           $ports = explode(" ", $_SESSION["ports"]);
           for($i = 0; $i < sizeof($ports);$i++) echo '<option value="'. $ports[$i] .'">'. $ports[$i] .'</option>';
           ?>
        </select>
    </form>

        <input type="hidden" name="ip_config">
        <input type="submit" class="continue-button" name="action" value="Tovább">
        </div>

        <!-- IP beállítás doboz -->
        <div class="ip-settings-box">
            <div class="ip-title">IP Beállítás</div>
            <p class="ip-textbox"p>lololo</p>
        </div>

        <!-- Kommand szintaxisa doboz -->
        <div class="k-box">
            <div class="k-title">Kommand szintaxisa</div>
            <p>alma</p>
        </div>

        <div class="k-box">
            <div class="k-title">Kimenet</div>
            <p>BARNA CUKIIIIIII</p>
        </div>
    </div>
</div>
