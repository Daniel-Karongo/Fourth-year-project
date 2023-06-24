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
        document.querySelector('#businessPremiseType').style.display = "none";
        document.querySelector('#rentalTerm').style.display = "flex";
        document.querySelector('#label-more-bedrooms').textContent = "Number Of Beds";
    } else {
        document.querySelector('#moreBedrooms').style.display = "none";
        document.querySelector('#businessPremiseType').style.display = "none";
        document.querySelector('#rentalTerm').style.display = "none"
    }

    document.querySelector('#type-of-premise').selectedIndex = 0;
    document.querySelector('#rental-term').selectedIndex = 0;
    document.querySelector('#more-bedrooms').value = "";
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

function filterDisplay() {
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
                
                let numberOfBedroomsFieldApartment = document.querySelector('.filter-form #more-bedrooms');
                let numberOfApartmentBedrooms = numberOfBedroomsFieldApartment.value;

                if(numberOfApartmentBedrooms !== "") {
                    templateDiv.style.display = "block";
                    if(div.innerHTML !== (numberOfApartmentBedrooms + "-Bedroom Apartment")) {templateDiv.style.display = "none";};
                }
                break;

            case "Business Premise":
                templateDiv.style.display = "block";
                if((div.innerHTML !== "Stall") && (div.innerHTML !== "Shop") && (div.innerHTML !== "Event Hall") && (div.innerHTML !== "WareHouse") && (div.innerHTML !== "Office") && (div.innerHTML !== "Industrial")) {
                    templateDiv.style.display = "none";
                }
                
                let premiseTypeField = document.querySelector('.filter-form #type-of-premise');
                let premiseType = premiseTypeField.value;

                if(premiseType !== "no-value") {
                    templateDiv.style.display = "block";
                    switch(premiseType) {
                        case "Stall":
                            if(div.innerHTML !== "Stall") {templateDiv.style.display = "none";};
                            break;
                        case "Shop":
                            if(div.innerHTML !== "Shop") {templateDiv.style.display = "none";};
                            break;
                        case "Event Hall":
                            if(div.innerHTML !== "Event Hall") {templateDiv.style.display = "none";};
                            break;
                        case "Warehouse":
                            if(div.innerHTML !== "Warehouse") {templateDiv.style.display = "none";};
                            break;
                        case "Office":
                            if(div.innerHTML !== "Office") {templateDiv.style.display = "none";};
                            break;
                        case "Industrial":
                            if(div.innerHTML !== "Industrial") {templateDiv.style.display = "none";};
                            break;
                    }                    
                }

                let businessRentalTermField = document.querySelector('.filter-form #rental-term');
                let businessRentalTerm = businessRentalTermField.value; 
                if(businessRentalTerm !== "no-value") {
                    let rentalTermInDiv = document.querySelectorAll('.rent-term-display');
                    rentalTermInDiv.forEach((div) => {
                        descriptionDiv = div.parentElement;
                        rentaldivDiv = descriptionDiv.parentElement;
                        templateDiv = rentaldivDiv.parentElement;
                        switch(businessRentalTerm) {
                            case "daily":
                                if(div.innerHTML !== "Per Day") {templateDiv.style.display = "none";}
                                break;
                
                            case "weekly":
                                if(div.innerHTML !== "Per Week") {templateDiv.style.display = "none";}
                                break;
                
                            case "monthly":
                                if(div.innerHTML !== "Per Month") {templateDiv.style.display = "none";}
                                break;
                
                            case "yearly":
                                if(div.innerHTML !== "Per Year") {templateDiv.style.display = "none";}
                                break;
                
                            case "quarterly":
                                if(div.innerHTML !== "Every 3 Months") {templateDiv.style.display = "none";}
                                break;
                
                            case "bi-annually":
                                if(div.innerHTML !== "Every 6 Months") {templateDiv.style.display = "none";}
                                break;
                        }
                    });
                }

                break;

            case "House":
                templateDiv.style.display = "block";
                if(div.innerHTML.includes("House") !== true) {templateDiv.style.display = "none";}

                let numberOfHouseBedroomsField = document.querySelector('.filter-form #more-bedrooms');
                let numberOfHouseBedrooms = numberOfHouseBedroomsField.value;

                if(numberOfHouseBedrooms !== "") {
                    templateDiv.style.display = "block";
                    if(div.innerHTML !== (numberOfHouseBedrooms + "-Bedroom House")) {templateDiv.style.display = "none";}
                }

                break;

            case "Suite":
                templateDiv.style.display = "block";
                if(div.innerHTML.includes("Suite") !== true) {templateDiv.style.display = "none";}
                

                let numberOfSuiteBedsField = document.querySelector('.filter-form #more-bedrooms');
                let numberOfSuiteBeds = numberOfSuiteBedsField.value;

                if(numberOfSuiteBeds !== "") {
                    let numberOfSuiteBedsInDiv = document.querySelectorAll('.rental-type-display');
                    numberOfSuiteBedsInDiv.forEach((div) => {
                        descriptionDiv = div.parentElement;
                        rentaldivDiv = descriptionDiv.parentElement;
                        templateDiv = rentaldivDiv.parentElement;
                        
                        if(div.innerHTML != (numberOfSuiteBeds + "-Bed Suite")) {templateDiv.style.display = "none";}
                    });
                }

                
                let rentalTermField = document.querySelector('.filter-form #rental-term');
                let rentalTerm = rentalTermField.value; 
                if(rentalTerm !== "no-value") {
                    let rentalTermInDiv = document.querySelectorAll('.rent-term-display');
                    rentalTermInDiv.forEach((div) => {
                        descriptionDiv = div.parentElement;
                        rentaldivDiv = descriptionDiv.parentElement;
                        templateDiv = rentaldivDiv.parentElement;
                        switch(rentalTerm) {
                            case "daily":
                                if(div.innerHTML !== "Per Day") {templateDiv.style.display = "none";}
                                break;
                
                            case "weekly":
                                if(div.innerHTML !== "Per Week") {templateDiv.style.display = "none";}
                                break;
                
                            case "monthly":
                                if(div.innerHTML !== "Per Month") {templateDiv.style.display = "none";}
                                break;
                
                            case "yearly":
                                if(div.innerHTML !== "Per Year") {templateDiv.style.display = "none";}
                                break;
                
                            case "quarterly":
                                if(div.innerHTML !== "Every 3 Months") {templateDiv.style.display = "none";}
                                break;
                
                            case "bi-annually":
                                if(div.innerHTML !== "Every 6 Months") {templateDiv.style.display = "none";}
                                break;
                        }
                    });
                }


                break;

            default:
                templateDiv.style.display = "block";
    
        }
    });
}