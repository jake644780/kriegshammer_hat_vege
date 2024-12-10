
<script>
    

    function validateInput(inputId, buttonId) {
    // Get the input value
    const inputValue = document.getElementById(inputId).value;
    
    // Define the regex pattern (alphanumeric, no spaces)
    const regexPattern = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;

    // Get the button element
    const button = document.getElementById(buttonId);

    // Check if the input value matches the regex pattern
    if (regexPattern.test(inputValue)) {
        button.disabled = false;  // Enable the button
    } else {
        button.disabled = true;   // Disable the button
    }
}

   

<?php

for ($i = 2; $i < 7;$i++){
    echo "
    document.getElementById('input" . $i . "').addEventListener('input', function() {
        validateInput('input" . $i . "', 'submitbutton" . $i . "');
    });";
}
echo "window.onload = function() {";
for ($i = 1; $i < 7;$i++){
    echo "
    validateInput('input" . $i . "', 'submitbutton" . $i ."');
    ";

}
echo "};";




?>
  
</script>



<style>

    body{
        margin: 0;
        padding: 0;
    }
    *{
        font-family: 'Poppins', 'sans-serif';
    }
    .dual-bar {
        width: 100%;
        height: 150px;
        display: flex;
        flex-direction: column;
    }

    .upper-bar {
        flex: 2;
        background-color: rgba(204, 204, 204, 90%);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        position: relative;
    }

    .lower-bar {
        flex: 1;
        background-color: #000000;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding: 10px;
    }

    .lower-bar button {
        background-color: #d3d3d3;
        color: black;
        font-size: 18px;
        font-weight: bold;
        padding: 10px 30px;
        border: none;
        border-radius: 15px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .lower-bar button:hover {
        background-color: #FFA500;
        color: #ffffff;
    }

    .team-container {
        background-color: #555555;
        padding: 10px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .team-name {
        font-family: 'Poppins', sans-serif;
        font-size: 28px;
        font-weight: 600;
        color: #FFA500;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        letter-spacing: 1px;
        text-align: center;
    }

    .menu-title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-image: url("images/galaxy3.jpg");
        color: white;
        font-size: 24px;
        font-weight: bold;
        padding: 15px 30px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .content {
        min-height: calc(100vh - 150px);
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        gap: 30px;
        padding-top: 50px;
    }

    .center-box {
        background-color: #ffffff;
        width: 690px;
        max-width: 690px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
    }

    .ip-settings-box {
        background-color: #ffffff;
        padding: 20px;
        margin-top: 20px;
        width: 600px;
        border-radius: 8px;
    }

    .content-box-wrapper {
        
        background-color: rgba(211, 211, 211, 70%);
        padding: 20px 0;
        width: 900px;
        max-width: 900px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
        padding-top: 60px;
        padding-bottom: 60px;
    }

    .ip-title {
        background-image: url("images/galaxy.jpg");
        color: white;
        font-size: 22px;
        font-weight: bold;
        padding: 10px;
        text-align: center;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .ip-textbox {
        width: 100%;
        height: 100px;
        font-size: 16px;
        border: 2px solid #cccccc;
        border-radius: 8px;
        outline: none;
        transition: border-color 0.3s ease;
        padding-left: 5px;
        padding-top: 5px;
    }

    .ip-textbox:focus {
        border-color: #FFA500;
    }

    .text-label {
        font-size: 20px;
        font-weight: bold;
        color: #000000;
        text-align: center;
    }

    .text-box {
        width: 300px;
        max-width: 300px;
        padding: 10px;
        font-size: 16px;
        border: 2px solid #cccccc;
        border-radius: 8px;
        text-align: center;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .text-box:focus {
        border-color: #FFA500;
    }

    .continue-button {
        background-color: #FFA500;
        color: #000000;
        font-size: 18px;
        font-weight: bold;
        padding: 10px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }


    .continue-button:hover {
        background-color: #cc8400;
        color: #ffffff;
    }

    .kommand-box {
        background-color: #ffffff;
        color: #000000;
        padding: 20px;
        width: 640px;
        max-width: 640px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }



    .k-box {
        background-color: #ffffff;
        color: #000000;
        padding: 20px;
        width: 650px;
        max-width: 650px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .k-box p {
        background-color: #000000;
        color: #ffffff;
        width: 100%;
        /*height: 150px;*/
        font-size: 16px;
        border: 2px solid #cccccc;
        border-radius: 8px;
        outline: none;
        transition: border-color 0.3s ease;
        padding-left: 5px;
        padding-top: 5px;
    }

    .k-box textarea:focus {
        border-color: #FFA500;
    }

    .k-title {
        background-image: url("images/cica.jpg");
        color: white;
        text-align: center;
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: bold;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }


    .banan {
        background-image: url("images/galaxy_seamless.avif");
    }

    .content {


        display: none;
    }

    .lower-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px; /* Consistent spacing between buttons */
    flex-wrap: nowrap; /* Ensure all elements stay in one line */
    overflow: hidden; /* Prevent overflow issues */
    white-space: nowrap; /* Prevent button text from wrapping */
    }

    .lower-bar button {
    flex: 1 1 0; /* Ensure equal sizes */
    min-width: 100px; /* Prevent buttons from becoming too small */
    max-width: 150px; /* Optional: Set a maximum size */
    text-align: center;
    }

    .continue-button:disabled {
    background-color: #ccc; /* Grey color when disabled */
    color: #777; /* Lighter text color */
    cursor: not-allowed; /* Change cursor to indicate it's not clickable */
    }


</style>