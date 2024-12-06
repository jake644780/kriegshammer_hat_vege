<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu testing</title>
</head>
<body>
    <div class="nav">
        <div class="menupont" id="1"><button class="navbutton">1</button></div>
        <div class="menupont" id="2"><button class="navbutton">2</button></div>
        <div class="menupont" id="3"><button class="navbutton">3</button></div>
        <div class="menupont" id="4"><button class="navbutton">4</button></div>
        <div class="menupont" id="5"><button class="navbutton">5</button></div>
    </div>
</body>

<div class="item" id="11"></div>
<div class="item" id="22"></div>
<div class="item" id="33"></div>
<div class="item" id="44"></div>
<div class="item" id="55"></div>

</html>

<style>
    .nav{
        display: grid;
        grid-template-columns: repeat(5, 1fr);
    }
    .menupont{
        grid-column-start: span 1;
        grid-column-end: span 1;
        display: grid;
        place-items: center;
    }

    .navbutton{
        width: 100%;
    }


</style>
<script>



</script>