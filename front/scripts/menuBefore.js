
function showDiv(divNumber) {
    const divs = document.querySelectorAll('.content');
    
    divs.forEach(div => {
        div.style.display = 'none';
    });

    const selectedDiv = document.getElementById(`content${divNumber}`);
    if (selectedDiv) selectedDiv.style.display = 'flex';

    const buttons = document.querySelectorAll(".butto");
    buttons.forEach(button => {
        button.style.backgroundColor = '#d3d3d3';
        button.style.color = '#000';
    });
    const selectedButton = document.getElementById(`butto${divNumber}`);
    if (selectedButton){
        selectedButton.style.backgroundColor = '#00008b';
        selectedButton.style.color = '#fff';
    }
}