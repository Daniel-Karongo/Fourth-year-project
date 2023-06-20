function zoomDiv(div) {
    div.style.transform = 'scale(1.02, 1.0)';
    div.style.borderColor = '#2C18DE';
    div.style.outline = '2px solid #2C18DE';
}

function unzoomDiv(div) {
    div.style.transform = 'scale(1)';
    div.style.border = 0;
    div.style.boxShadow = '0px 0px 5px 2px rgba(0,0,0,0.5)';
    div.style.outline = 'none';
}