<style>
    /* Alapstílusok */
    body {
        margin: 0;
        background-color: #f0f0f0; /* Világos szürke háttér */
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    
    /* Felső sáv */
    .top-bar {
        position: absolute;
        top: 0;
        width: 100%;
        background-color: #333333; /* Sötét szürke */
        color: #ffffff;
        display: flex;
        justify-content: flex-start; /* Balra igazított tartalom */
        align-items: center;
        padding: 0 40px; /* Térköz balról és jobbról */
        height: 90px; /* Nagyobb felső rész */
    }
    
    .header-content {
        display: flex;
        align-items: center;
    }
    
    .team-name {
        font-family: 'Poppins', sans-serif; /* Modern betűtípus */
        font-size: 28px; /* Nagyobb szöveg */
        font-weight: 600;
        color: #FFA500; /* Világos narancssárga */
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Árnyék a szövegnél */
        letter-spacing: 1px; /* Térköz a betűk között */
        padding-left: 20px; /* Távolság a bal széltől */
    }
    
    /* Bejelentkezési konténer */
    .login-container {
        position: relative;
        width: 500px; /* Szélesebb konténer */
        background-color: #e0e0e0; /* Világos szürke belső */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding-bottom: 30px; /* Extra térköz lent */
    }
    
    /* Világos narancssárga fejléc */
    .login-header {
        background-color: #FFA500; /* Világos narancssárga tető */
        height: 10px;
    }
    
    /* Oldalsó sötétszürke sávok */
    .login-side {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 20px; /* Szélesebb oldalsó sávok */
        background-color: #333333; /* Sötétszürke */
    }
    
    .login-side-left {
        left: 0; /* Bal oldali sáv */
    }
    
    .login-side-right {
        right: 0; /* Jobb oldali sáv */
    }
    
    /* Űrlap stílusai */
    form {
        padding: 40px; /* Több térköz */
        display: flex;
        flex-direction: column;
    }
    
    /* Csoportosított mezők (ikon + beviteli mező) */
    .input-group {
        display: flex;
        align-items: center;
        position: relative;
        margin-bottom: 25px; /* Több hely a mezők között */
    }
    
    .input-group i {
        position: absolute;
        left: 12px;
        color: #999999; /* Halvány szürke ikonok */
        font-size: 18px;
    }
    
    input {
        padding: 14px 14px 14px 50px; /* Balra eltolva az ikon miatt */
        width: 100%;
        border: 1px solid #999999; /* Halvány szürke szegély */
        border-radius: 5px;
        font-size: 16px;
        background-color: #ffffff; /* Fehér mezők */
        color: #333333; /* Sötét szöveg */
    }
    
    input::placeholder {
        color: #999999; /* Halvány szürke placeholder szöveg */
    }
    
    button {
        padding: 14px;
        background-color: #FFA500; /* Világos narancssárga gomb */
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 18px; /* Nagyobb gomb */
        cursor: pointer;
    }
    
    button:hover {
        background-color: #e68900; /* Sötétebb narancs hover esetén */
    }
</style>
