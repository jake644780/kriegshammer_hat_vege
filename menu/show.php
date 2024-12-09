<div class="content" id="content1">
        <div class="content-box-wrapper">
            <!-- Középső doboz -->
            <div class="center-box">
            <form action="Nmenu.php" method="POST">
                <label for="text1" class="text-label">beállítások megtekintése</label>
                <br>
                <input type="hidden" name="type" value="show_running">
                <input type="submit" class="continue-button" name="action" value="Tovább">
            </form>
            </div>
           
    
                <?php

                    if (!($out === "")){
                        echo '<div class="k-box"><div class="k-title">Kimenet</div><p>';
                        $snip = explode("show running-config", $out);
                        echo nl2br(htmlspecialchars($snip[1]));
                        echo '</p></div>';

                    }
                        
                ?>
            
        </div>
        </div>
    </div>
