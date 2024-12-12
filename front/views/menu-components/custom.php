<div class="content" id="content7">
    <div class="content-box-wrapper">
        <!-- Középső doboz -->
        <div class="center-box">
            <form action="<?php echo $controllerPATH; ?>" method="POST">
                <label for="text1" class="text-label">írja be a parancsokat!</label>
                <textarea name="custom" id="custom"></textarea>
                <br>
                <br>
                <input type="hidden" name="type" value="custom">
                <input type="submit" id="customsubmit" class="continue-button" name="action" value="Tovább">
            </form>
        </div>

        <?php
        if ($_SESSION["last"] === 7) {
            echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';
            $snip = file_get_contents($outputPATH);
            echo nl2br(htmlspecialchars($snip));
            echo '</p></div>';
        }
        ?>
    </div>
</div>