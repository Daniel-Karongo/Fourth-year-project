function showFilters() {
    let toView = document.querySelector('.filters-ammenities-and-preferences');   
    toView.style.display = 'flex';      
}

function hideFilters() {
    let toHide = document.querySelector('.filters-ammenities-and-preferences');
    toHide.style.display = 'none';
}

function zoomDiv(div) {
    // Store the original border color
    var originalBorderColor = div.style.borderColor;

    div.style.transform = 'scale(1.02, 1.0)';
    div.style.borderColor = '#2C18DE';
    div.style.outline = '2px solid #2C18DE';

    // Add the original border color to the div as a data attribute
    div.setAttribute('data-original-border-color', originalBorderColor);
}
  
function unzoomDiv(div) {
    div.style.transform = 'scale(1)';

    // Restore the original border color
    var originalBorderColor = div.getAttribute('data-original-border-color');
    div.style.borderColor = originalBorderColor;

    div.style.outline = 'none';
}
  
function activateAnchor(event) {
    const clickedElement = event.target;
    const form = document.querySelectorAll('.rental-div');
    form.forEach((div) => {
        const descendants = div.querySelectorAll('*');
        descendants.forEach((descendant) => {
            if(descendant === clickedElement) {
                const form = div.querySelector('.template-more-details');
                form.submit();
            }
        });        
    });
}