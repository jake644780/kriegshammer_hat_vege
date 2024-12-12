function addExcludedAddress() {
    const excludedContainer = document.getElementById('excluded-container');
    const input = document.createElement('input');
    input.type = 'text';
    input.classList.add("text-label");
    input.name = 'excluded_addresses[]';
    input.placeholder = 'e.g., 192.168.1.50';
    excludedContainer.appendChild(input);
}


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


        document.getElementById('input2').addEventListener('input', function() {
            validateInput('input2', 'submitbutton2');
        });
        document.getElementById('input3').addEventListener('input', function() {
            validateInput('input3', 'submitbutton3');
        });
        document.getElementById('input6').addEventListener('input', function() {
            validateInput('input6', 'submitbutton6');
        });

        window.onload = function() {
            validateInput('input2', 'submitbutton2');
            validateInput('input3', 'submitbutton3');
            validateInput('input6', 'submitbutton6');
        };
