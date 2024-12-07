<div class="content" id="content1">
        <div class="content-box-wrapper">
            <!-- Középső doboz -->
            <div class="center-box">
            <form action="controller.php" method="POST">
                <label for="text1" class="text-label">beállítások megtekintése</label>
                <br>
                <input type="hidden" name="show-running">
                <input type="submit" class="continue-button" name="action" value="Tovább">
            </form>
            </div>
            <!-- Új IP beállítás doboz -->
            <div class="ip-settings-box">
                <div class="ip-title">show running-config</div>
                <div class="ip-textbox">
                Ez a parancs a router vagy switch konfigurációs fájlja aktuális állapotának megjelenítésére szolgál. A futó konfiguráció tartalmazza az összes aktív beállítást, amely jelenleg működik az eszközön.
                <br>
                Ez a parancs megjeleníti az eszköz teljes, jelenleg alkalmazott konfigurációját, beleértve a hálózati beállításokat, interfészeket, routing táblákat és más konfigurációkat.
                </div>
            </div>
            <div class="k-box">
                <div class="k-title">Kommand szintaxisa</div>
                <p>show running-config</p>
            </div>
    
            <div class="k-box">
                <div class="k-title">Kimenet</div>
                <p></p>
            </div>
        </div>
        </div>
    </div>
