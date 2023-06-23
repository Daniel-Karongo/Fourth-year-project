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

function orderFormSubmitter() {
    let selectedOption = document.querySelector('#order-by').value;
    let divs = document.querySelectorAll('.template');
    let amountArray = [];
    divs.forEach((div) => {
        let rentAmount = div.querySelector('.rent-amount').innerHTML;
        let rentAmountArray = rentAmount.split(". ");
        let actualAmount = rentAmountArray[1];
        let usableAmount = Number(actualAmount);
        amountArray.push(usableAmount);
    });
    amountArray.sort(function(a, b) {
        return a - b;
    });
    originalAmountsFormat = [];
    amountArray.forEach((amount) => {
        amount = "Ksh. " + amount;
        originalAmountsFormat.push(amount);
    });
    divsOrder = [];
    originalAmountsFormat.forEach((amount) => {
        divs.forEach((div) => {
            let rentAmount = div.querySelector('.rent-amount').innerHTML;
            if(rentAmount === amount) {
                divsOrder.push(div);
            }
        });
    });

    if(selectedOption === "price-low-high") {
        for(i=0; i<divsOrder.length; i++) {
            divsOrder[i].style.order = i+1;
        }
    } else if (selectedOption === "price-high-low") {
        for(i=0; i<divsOrder.length; i++) {
            divsOrder[i].style.order = (divsOrder.length - i);
        }
    }
}

function wrapperFunction() {
    hideFilters();
    filterDisplay();
}

function filterRentalType() {
    let typeOfRentalField = document.querySelector('.filter-form #type-of-rental');
    let typeOfRental = typeOfRentalField.value;

    let typeOfRentalInDiv = document.querySelectorAll('.rental-type-display');
    typeOfRentalInDiv.forEach((div) => {
        descriptionDiv = div.parentElement;
        rentaldivDiv = descriptionDiv.parentElement;
        templateDiv = rentaldivDiv.parentElement;
        switch(typeOfRental) {
            case "Hostel":
                templateDiv.style.display = "block";
                if(div.innerHTML !== "Hostel") {templateDiv.style.display = "none";}
                break;
            case "Single Room":
                templateDiv.style.display = "block";
                if(div.innerHTML !== "Single Room") {templateDiv.style.display = "none";}
                break;
            case "Bedsitter":
                templateDiv.style.display = "block";
                if(div.innerHTML !== "Bedsitter") {templateDiv.style.display = "none";}
                break;
            case "Apartment":
                templateDiv.style.display = "block";
                if(div.innerHTML.includes("Apartment") !== true) {templateDiv.style.display = "none";}
                
                // let numberOfBedroomsField = document.querySelector('.filter-form #more-bedrooms');
                // let numberOfBedrooms = numberOfBedroomsField.value;

                // if(numberOfBedrooms !== "") {
                //     templateDiv.style.display = "block";
                //     if(div.innerHTML !== (numberOfBedrooms + "-Bedroom Apartment")) {templateDiv.style.display = "none";}
                //     console.log(numberOfBedrooms + "-Bedroom Apartment");
                // }

                break;
            case "Business Premise":
                templateDiv.style.display = "block";
                if((div.innerHTML !== "Stall") && (div.innerHTML !== "Shop") && (div.innerHTML !== "Event Hall") && (div.innerHTML !== "WareHouse") && (div.innerHTML !== "Office") && (div.innerHTML !== "Industrial")) {
                    templateDiv.style.display = "none";
                }
                break;
            case "House":
                templateDiv.style.display = "block";
                if(div.innerHTML.includes("House") !== true) {templateDiv.style.display = "none";}
                break;
            case "Suite":
                templateDiv.style.display = "block";
                if(div.innerHTML !== "Suite") {templateDiv.style.display = "none";}
                break;
            default:
                templateDiv.style.display = "block";
    
        }
    });
}


function filterDisplay() {
    filterRentalType();
}