<?php
session_start();
$_SESSION["last"] = 99;

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriegshammer</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/belepes.css">
    
</head>
<body class="banan">
        <div class="top-bar">
                <div class="team-container">
                    <span class="team-name">Kriegshammer</span>
                </div>
        </div>
    <main>
        <div class="login-container">
            <div class="login-header"></div> 
            <div class="login-side login-side-left"></div> 
            <div class="login-side login-side-right"></div> 



            <form method="POST" action="menu.php">
                <div class="input-group">
                    <i class="fas fa-network-wired"></i>
                    <input type="text" id="ip" name="ip" placeholder="IP cím" value="192.168.1.52" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="username" name="name" placeholder="Felhasználónév" required>
                </div>
                
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="pass" placeholder="Jelszó" required>
                </div>
                <input type="hidden" name="login">
                
                <button type="submit" name="action" class="k-title">Tovább</button>
            </form>
        </div>
    </main>
</body>
</html>
