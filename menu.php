<!--



if (isset($_POST["login"])){
    //catching data from login form
    $ip   = @$_POST["ip"]  ;
    $user = @$_POST["user"];
    $pass = @$_POST["pass"];
    
    try{
        $ssh = new SSH2($ip);
    }catch(Exception $e){

    }
}else if(isset($_POST["show_running"])){
}else if(isset($_POST["ip_config"])){
}else if(isset($_POST["static_route"])){
}else if(isset($_POST["turnon_port"])){
}else if(isset($_POST["dhcp"])){
}else if(isset($_POST["custom"])){


-->


