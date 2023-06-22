function showFilters() {
    let toView = document.querySelector('.filter-form');   
    if((window.getComputedStyle(toView).display) === "none") {
        toView.style.display = 'flex';
    } else {
        toView.style.display = 'none';
    }
}

function hideFilters() {
    let toHide = document.querySelector('.filter-form');    
    toHide.style.display = 'none';
}

function zoomDiv(div) {
    // Store the original border color
    let originalBorderColor = div.style.borderColor;

    div.style.transform = 'scale(1.02, 1.0)';
    div.style.borderColor = '#2C18DE';
    div.style.outline = '2px solid #2C18DE';

    // Add the original border color to the div as a data attribute
    div.setAttribute('original-border-color', originalBorderColor);
}
  
function unzoomDiv(div) {
    div.style.transform = 'scale(1)';

    // Restore the original border color
    let originalBorderColor = div.getAttribute('original-border-color');
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

function displayParameters() {
    let selectedOption = document.querySelector('#type-of-rental').value;
    if(selectedOption === "Business Premise") {
        document.querySelector('#businessPremiseType').style.display = "flex";
        document.querySelector('#rentalTerm').style.display = "flex";
        document.querySelector('#moreBedrooms').style.display = "none";
    } else if ((selectedOption === "Apartment") || (selectedOption === "House")) {
        document.querySelector('#moreBedrooms').style.display = "flex";
        document.querySelector('#businessPremiseType').style.display = "none";
        document.querySelector('#rentalTerm').style.display = "none";
    } else if (selectedOption === "Suite") {
        document.querySelector('#moreBedrooms').style.display = "flex";
        document.querySelector('#moreBedrooms label').textContent = "";
        document.querySelector('#moreBedrooms label').textContent = "Number Of Beds";
        document.querySelector('#businessPremiseType').style.display = "none";
        document.querySelector('#rentalTerm').style.display = "none";
    } else {
        document.querySelector('#moreBedrooms').style.display = "none";
        document.querySelector('#businessPremiseType').style.display = "none";
        document.querySelector('#rentalTerm').style.display = "none"
    }
}