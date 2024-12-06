<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/menuCSS.css"></link>
    <title>Új Oldal</title>
</head>
<body>
    <!-- Két részre osztott felső sáv -->
    <div class="dual-bar">
        <div class="upper-bar">
            <div class="team-container">
                <div class="team-name">Kriegshammer</div>
            </div>
            <div class="menu-title">Menü</div>
        </div>
        <div class="lower-bar">
            <button onclick="showDiv(1)">show running config</button>
            <button onclick="showDiv(2)">ip config</button>
            <button onclick="showDiv(3)">static route</button>
            <button onclick="showDiv(4)">turn on port</button>
            <button onclick="showDiv(5)">dhcp</button>
            <button onclick="showDiv(6)">Custom</button>
        </div>
    </div>

    <!-- Tartalom helye --><div class="big-content">
        
        <div class="content" id="content1">
            <!-- Középső doboz -->
            <div class="center-box">
                <label for="text1" class="text-label">show running</label>
        
                <button class="continue-button">Tovább</button>
            </div>
        
            <!-- Új IP beállítás doboz -->
            <div class="ip-settings-box">
                <div class="ip-title">Ip beállítás</div>
                <div class="ip-textbox">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod velit facere obcaecati amet? Unde earum eos reiciendis mollitia quod animi. Magni, consectetur corrupti. Alias, deleniti distinctio doloremque illum molestias fuga.</div>
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------->
        <div class="content" id="content2">
            <!-- Középső doboz -->
            <div class="center-box">
                <label for="text1" class="text-label">Ip config</label>
                <input type="text" id="text1" class="text-box">
                <label for="text2" class="text-label">Port:</label>
                <input type="text" id="text2" class="text-box">
                <label for="text3" class="text-label">Szöveg:</label>
                <input type="text" id="text3" class="text-box">
                <button class="continue-button">Tovább</button>
            </div>
        
            <!-- Új IP beállítás doboz -->
            <div class="ip-settings-box">
                <div class="ip-title">Ip beállítás</div>
                <div class="ip-textbox">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod velit facere obcaecati amet? Unde earum eos reiciendis mollitia quod animi. Magni, consectetur corrupti. Alias, deleniti distinctio doloremque illum molestias fuga.</div>
        
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------->
        <div class="content" id="content3">
            <!-- Középső doboz -->
            <div class="center-box">
                <label for="text1" class="text-label">Static route</label>
                <input type="text" id="text1" class="text-box">
                <label for="text2" class="text-label">Szöveg:</label>
                <input type="text" id="text2" class="text-box">
                <label for="text3" class="text-label">Szöveg:</label>
                <input type="text" id="text3" class="text-box">
                <button class="continue-button">Tovább</button>
            </div>
        
            <!-- Új IP beállítás doboz -->
            <div class="ip-settings-box">
                <div class="ip-title">Ip beállítás</div>
                <div class="ip-textbox">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod velit facere obcaecati amet? Unde earum eos reiciendis mollitia quod animi. Magni, consectetur corrupti. Alias, deleniti distinctio doloremque illum molestias fuga.</div>
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------->
        <div class="content" id="content4">
            <!-- Középső doboz -->
            <div class="center-box">
                <label for="text1" class="text-label">turn on port</label>
                <input type="text" id="text1" class="text-box">
                <label for="text2" class="text-label">Szöveg:</label>
                <input type="text" id="text2" class="text-box">
                <label for="text3" class="text-label">Szöveg:</label>
                <input type="text" id="text3" class="text-box">
                <button class="continue-button">Tovább</button>
            </div>
        
            <!-- Új IP beállítás doboz -->
            <div class="ip-settings-box">
                <div class="ip-title">Ip beállítás</div>
                <div class="ip-textbox">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod velit facere obcaecati amet? Unde earum eos reiciendis mollitia quod animi. Magni, consectetur corrupti. Alias, deleniti distinctio doloremque illum molestias fuga.</div>
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------->
        <div class="content" id="content5">
            <!-- Középső doboz -->
            <div class="center-box">
                <label for="text1" class="text-label">dhcp</label>
                <input type="text" id="text1" class="text-box">
                <label for="text2" class="text-label">Szöveg:</label>
                <input type="text" id="text2" class="text-box">
                <label for="text3" class="text-label">Szöveg:</label>
                <input type="text" id="text3" class="text-box">
                <button class="continue-button">Tovább</button>
            </div>
        
            <!-- Új IP beállítás doboz -->
            <div class="ip-settings-box">
                <div class="ip-title">Ip beállítás</div>
                <div class="ip-textbox">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod velit facere obcaecati amet? Unde earum eos reiciendis mollitia quod animi. Magni, consectetur corrupti. Alias, deleniti distinctio doloremque illum molestias fuga.</div>
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------->
        <div class="content" id="content6">
            <!-- Középső doboz -->
            <div class="center-box">
                <label for="text1" class="text-label">custom</label>
                <input type="text" id="text1" class="text-box">
            
                <button class="continue-button">Tovább</button>
            </div>
        
            <!-- Új IP beállítás doboz -->
            <div class="ip-settings-box">
                <div class="ip-title">Ip beállítás</div>
                <div class="ip-textbox">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod velit facere obcaecati amet? Unde earum eos reiciendis mollitia quod animi. Magni, consectetur corrupti. Alias, deleniti distinctio doloremque illum molestias fuga.</div>
            </div>
        </div>
    </div>
</body>
</html>


<script>
function showDiv(divNumber) {
    // Get all div elements with the class "content"
    const divs = document.querySelectorAll('.content');
    
    // Hide all divs
    divs.forEach(div => {
        div.style.display = 'none';
    });

    // Show the selected div
    const selectedDiv = document.getElementById(`content${divNumber}`);
    if (selectedDiv) {
        selectedDiv.style.display = 'block';
    }
}


</script>

<style>
.content{
    display: none;
}
</style>