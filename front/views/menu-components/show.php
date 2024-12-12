<div class="content" id="content1">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
            <form action="<?php echo $controllerPATH; ?>" method="POST">
                <label for="text1" class="text-label">beállítások megtekintése</label>
                <br>
                <input type="hidden" name="type" value="show_running">
                <input type="submit" class="continue-button" name="action" value="Tovább">
            </form>
        </div>


        <?php

        if ($_SESSION["last"] === 1) {
            echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';
            $conf = file_get_contents($outputPATH);
            $snip = explode("show running-config", $conf);
            echo nl2br(htmlspecialchars($snip[1]));
            echo '</p></div>';
        }

        ?>

    </div>
</div>
</div>