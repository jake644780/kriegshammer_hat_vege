async function translatePage(lang) {
    const divs = document.querySelectorAll('.content');
    divs.forEach(div => {div.style.display = 'none';});
    
    const selectedDiv = document.getElementById(lang);
    if (selectedDiv) selectedDiv.style.display = 'flex';
}
translatePage('hu');