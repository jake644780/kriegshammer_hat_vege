<div class="content" id="content2">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
        <form action="controller.php" method="POST">
        <label for="ports">válassz ki egy portot:</label>
        <select id="ports" class="dropdown" name ="port">;
            <?php
            for($i = 0; $i < sizeof($ports);$i++) echo '<option value="'. $ports[$i] .'">'. $ports[$i] .'</option>';
           ?>
        </select>
    </form>


        <input type="hidden" name="ip_config">
        <input type="submit" class="continue-button" name="action" value="Tovább">
        </div>

        

        <div class="k-box">
            <div class="k-title">Kimenet</div>
            <p>BARNA CUKIIIIIII</p>
        </div>
    </div>
</div>
