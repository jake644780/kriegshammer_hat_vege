<?php




session_start();
echo $_SESSION["ip"];
$menu = 0;


if (isset($_POST["action"])) {

    if (isset($_POST["login"])) {
    
            $ip = filter_var(trim($_POST["ip"]), FILTER_VALIDATE_IP);
            $user = htmlspecialchars(trim($_POST["user"]));
            $pass = htmlspecialchars(trim($_POST["pass"]));
    
            if (!$ip || empty($user) || empty($pass)) {
                header("Location: back/error.php?error=invalid_input");
                exit;
            }
    
            try {
                $ssh = new SSH2($ip);
                if ($ssh->login($user, $pass)) {
                    $_SESSION['ip'] = $ip;
                    $_SESSION['user'] = $user;
                    $_SESSION["pass"] = $pass;
                    $menu = 1;
                } else {
                    header("Location: back/error.php?error=login_failed");
                    exit;
                }
            } catch (Exception $e) {
                    header("Location: back/error.php?error=connection_failed");
                    exit;
            }
    
    }else if (isset($_POST["show-running"])){
        $ip = filter_var(trim($_POST["ip"]), FILTER_VALIDATE_IP);
        $user = htmlspecialchars(trim($_POST["user"]));
        $pass = htmlspecialchars(trim($_POST["pass"]));

        try {
            $ssh = new SSH2($ip);
            if ($ssh->login($user, $pass)) {
                echo "Logged in successfully.<br>";
        
                // Handle "enable" if needed, even without a password
                $ssh->write("enable\n"); // Send the "enable" command
                sleep(1); // Allow time for a potential prompt
                $ssh->write("e\n");
                // Send the terminal length command
                $ssh->write("terminal length 0\n");
                sleep(1);
        
                // Execute the command
                $ssh->write("show running-config\n");
                $output = $ssh->read();
        
                // Display the output
                echo nl2br(htmlspecialchars($output));
            } else {
                echo "SSH login failed.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
 
    }

}


if ($menu) require("menu.php");
