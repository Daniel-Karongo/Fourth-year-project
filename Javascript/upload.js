function toViewAndHide(view, hide, displaytype) {
    document.querySelector(view).style.display = displaytype;
    document.querySelector(hide).style.display = 'none';
    if(displaytype === "flex") {
        document.querySelector(view).style.flexDirection = "column";
    }   
}

function wrapperFunction(view, displaytype, hide) {
    toViewAndHide(view, hide, displaytype);    
}

function toViewAndHideMultiplesections(toHideArg, toViewArg) {
    toHide = document.querySelectorAll(toHideArg);
    toHide.forEach((element) => {
        element.style.display = 'none';
        if (element) {
            const children = element.children;          
            for (let i = 0; i < children.length; i++) {
              const child = children[i];
              if(child.tagName === 'SELECT') {
                child.selectedIndex = 0;
              } else if (child.tagName === 'INPUT') {
                child.value = '';
              }

            }
        } else {
            console.log("Element not found!");
        } 
    });
    toView = document.querySelectorAll(toViewArg);            
    toView.forEach((element) => {
        element.style.display = 'flex';
        element.style.flexDirection = "column";

    });
}

function clearLabel(numberofAvailableLabel, selectedOption, suffix) {
    numberofAvailableLabel.textContent = "";
    numberofAvailableLabel.textContent += ("Number of Available " + selectedOption + suffix); 
}

function viewNumberofRentalsSectionOfEachType() {
    let selectedOption = document.querySelector('#type-of-rental').value;   // The Option Selected    
    let numberofAvailableLabel = document.querySelector('.number-of-available-rentals');    // The label for the "Number of Available Rentals" input field     
    
    if (selectedOption !== 'no-value') {
        if ((selectedOption !== 'Apartment') && (selectedOption !== 'Business Premise') && (selectedOption !== 'House'))    // If the option selected is not "Apartment", "Business Premise" or "House" 
        {
            toViewAndHideMultiplesections(('.businessPremiseType, .houseBedrooms, .moreHouseBedrooms, .apartmentBedrooms, .moreApartmentBedrooms, .maximumNumberOfOccupants'), ('.numberOfAvailableRentals, .maximumNumberOfOccupants'));
            
            if(selectedOption === "Suite") {
                document.querySelector('.maximum-occupants').innerHTML = "";
                document.querySelector('.maximum-occupants').innerHTML += ("Number of Beds Available In Each Suite"); 
            } else {
                document.querySelector('.maximum-occupants').innerHTML = "";
                document.querySelector('.maximum-occupants').innerHTML += ("Preferred Maximum Number of Occupants For Each " + selectedOption);
            }

            clearLabel(numberofAvailableLabel, selectedOption, "s");
            // Clear whatever is on the "Number of Available Rentals" label
            // Replace the text of the "Number of Available Rentals" label with "Number of Available ..."                       

        } else if (selectedOption === 'Apartment') // If the option chosen is "Apartment"
        {
            toViewAndHideMultiplesections(('.businessPremiseType, .houseBedrooms, .moreApartmentBedrooms, .moreHouseBedrooms, .numberOfAvailableRentals, .maximumNumberOfOccupants'), '.apartmentBedrooms');    // Hide whatever other sections (Business Premise or House) that may be displayed
            // Unhide the section where the user specifies the number of bedrooms in the apartment.              

        } else if (selectedOption === 'Business Premise') // If the option choses is "Business Premise"
        {
            toViewAndHideMultiplesections(('.apartmentBedrooms, .houseBedrooms, .moreApartmentBedrooms, .moreHouseBedrooms, .numberOfAvailableRentals, .maximumNumberOfOccupants'), '.businessPremiseType');
            // Hide whatever other sections (Apartment or House) that may be displayed
            // Unhide the section where the user specifies the type of business premise.            

        } else if (selectedOption === 'House') {
            toViewAndHideMultiplesections(('.apartmentBedrooms, .businessPremiseType, .moreApartmentBedrooms, .moreHouseBedrooms, .numberOfAvailableRentals, .maximumNumberOfOccupants'), '.houseBedrooms'); 
            // Unhide the section where the user specifies the number of bedrooms in the house.

        }
               
    } else {
        toViewAndHideMultiplesections('.apartmentBedrooms, .moreApartmentBedrooms, .businessPremiseType, .houseBedrooms, .moreHouseBedrooms, .numberOfAvailableRentals, .maximumNumberOfOccupants', null);
        // Hide the "Number of Available Rentals" section if the default option is what is selected.

    }
    
    document.querySelector('#number-of-available-rentals').value = null;      // Clear what input may have been entered to the "Number of Available Rentals" section.            
}

function viewNumberOfSpecificApartmentBedrooms() {
    let selectedOption = document.querySelector('#number-of-apartment-bedrooms').value;     // The option selected (1-bedroom etc)
      
    if (selectedOption !== 'no-value') {    // If no option is selected
        if (selectedOption === 'more') {    // For "more" bedrooms
            toViewAndHideMultiplesections('.numberOfAvailableRentals', '.moreApartmentBedrooms');
            // Display the section that specifies how many bedrooms are in the apartment.             
            // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Apartments");

        } else {    // If some option is chosen that is not the default not the "more" values.
            toViewAndHideMultiplesections('.moreApartmentBedrooms', '.numberOfAvailableRentals');
            // Hide the section where the user specifies the number of bedrooms if greater than 3.          
            // Display the section (final) where the user specifies the total number of rentals available of the chosen type.              
            nullifySuccessOrFailure(document.getElementById('number-of-available-rentals'));
            nullifySuccessOrFailure(document.getElementById('more-apartment-bedrooms'));
            nullifySuccessOrFailure(document.getElementById('number-of-apartment-bedrooms'));
            toViewAndHideMultiplesections('.numberOfAvailableRentals', '.numberOfAvailableRentals');

            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Apartments");
            document.querySelector('#more-apartment-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.            

        }
    } else {    // If no option is chosen by the user.
        document.querySelector('#more-apartment-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.
        toViewAndHideMultiplesections(('.moreApartmentBedrooms, .numberOfAvailableRentals'), null);
        // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.           
        // Hide the section where the user specifies the number of bedrooms if greater than 3. 
    }
}

function viewNumberofSpecificHouseBedrooms() {
    let selectedOption = document.querySelector('#number-of-house-bedrooms').value;     // The option selected (1-bedroom etc)
        
    if (selectedOption !== 'no-value') {    // If no option is selected
        if (selectedOption === 'more') {    // For "more" bedrooms
            toViewAndHideMultiplesections('.numberOfAvailableRentals', '.moreHouseBedrooms');
            // Display the section that specifies how many bedrooms are in the house.             
            // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Houses");           
            
        } else {    // If some option is chosen that is not the default and not the "more" values.
            toViewAndHideMultiplesections('.moreHouseBedrooms', '.numberOfAvailableRentals');
            // Hide the section where the user specifies the number of bedrooms if greater than 3.          
            // Display the section (final) where the user specifies the total number of rentals available of the chosen type.
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Houses");
            document.querySelector('#more-house-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.
            nullifySuccessOrFailure(document.getElementById('number-of-available-rentals'));
            nullifySuccessOrFailure(document.getElementById('more-house-bedrooms'));
            nullifySuccessOrFailure(document.getElementById('number-of-house-bedrooms'));
            toViewAndHideMultiplesections('.numberOfAvailableRentals', '.numberOfAvailableRentals');

        }
    } else {    // If no option is chosen by the user. 
        toViewAndHideMultiplesections(('.moreHouseBedrooms, .numberOfAvailableRentals'), null);
        
        // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.           
        // Hide the section where the user specifies the number of bedrooms if greater than 3.          
        document.querySelector('#more-house-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.
    }        
}

function viewNumberofSpecificBusinessPremises() {
    let selectedOption = document.querySelector('#type-of-premise').value;     // The option selected (stall, shop etc)      
    
    if (selectedOption !== 'no-value')      // If no option is selected
    {    
        toViewAndHideMultiplesections(null, '.numberOfAvailableRentals');
        // Display the section (final) where the user specifies the total number of rentals available of the chosen type.
        nullifySuccessOrFailure(document.getElementById('number-of-available-rentals'));

        if (selectedOption !== 'Industrial') {
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, "s");             
        } else {
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Premises");            
        }        

    } else {    // If no option is chosen by the user. 
        toViewAndHideMultiplesections('.numberOfAvailableRentals', null);
       // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
    }
    nullifySuccessOrFailure(document.getElementById('number-of-available-rentals'));    
}

function viewNumberofSpecificBusinessPremises1() {
    viewNumberofSpecificBusinessPremises();
    toViewAndHideMultiplesections('.numberOfAvailableRentals', '.numberOfAvailableRentals');
}

function specifyTheFinalTheNumberOfApartments() {
    let enteredValue = document.querySelector('#more-apartment-bedrooms').value;     // The number of bedrooms manualy added.
        
    if (enteredValue !== "")      // If some value is entered
    {    
        toViewAndHideMultiplesections(null, '.numberOfAvailableRentals'); 
        // Display the section (final) where the user specifies the total number of rentals available of the chosen type.
        clearLabel(document.querySelector('.number-of-available-rentals'), enteredValue, "-Bedroom Apartments");

    } else {    // If no value has beeen entered by the user. 
        toViewAndHideMultiplesections('.numberOfAvailableRentals', null);
        // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.

    }
    nullifySuccessOrFailure(document.getElementById('number-of-available-rentals'));
    document.getElementById('number-of-available-rentals').focus();
}

function specifyTheFinalTheNumberOfHouses() {
    let enteredValue = document.querySelector('#more-house-bedrooms').value;     // The number of bedrooms manualy added.
        
    if (enteredValue !== "")      // If some value is entered
    {    
        toViewAndHideMultiplesections(null, '.numberOfAvailableRentals'); 
        // Display the section (final) where the user specifies the total number of rentals available of the chosen type.        
        clearLabel(document.querySelector('.number-of-available-rentals'), enteredValue, "-Bedroom Houses");
                                 
    } else {    // If no value has beeen entered by the user. 
        toViewAndHideMultiplesections('.numberOfAvailableRentals', null); 
        // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
    }
    nullifySuccessOrFailure(document.getElementById('number-of-available-rentals'));
    document.getElementById('number-of-available-rentals').focus();
}

function triggerFileInput(event) {
    if (event.key === 'Enter') {
        document.querySelector('.upload-photographs label').click();        
    }    
}

function specifyWhichReligion() {
    let inputDiv = document.querySelector('.specified-religion');

    if(document.querySelector('#other-religion').checked) {
        inputDiv.style.display = 'block';        
    } else {
        inputDiv.style.display = 'none';
        document.querySelector('#specified-religion').value = '';
    }
}

function uncheckAllOthers() {
    let checkboxes = document.querySelectorAll('.religion input[type="checkbox"]');
    let inputField = document.querySelector('#specified-religion');
    let radio = document.querySelector('#any-religion');

    // radio.checked = !radio.checked;

    if(radio.checked) {
        for(let i=0; i<checkboxes.length-1; i++) {
            checkboxes[i].disabled = true;            
            inputField.disabled = true;
        }       
    } else {
        checkboxes.forEach((checkbox) => {
            checkbox.disabled = false;
            inputField.disabled = false;
        });        
    }        
}

function displayError(element, errorMessage) {
    let parentDiv = element.parentElement;
    let error = parentDiv.querySelector('.error');                
    parentDiv.classList.add('error');
    parentDiv.classList.remove('success');
    error.innerHTML = errorMessage;             
}

function successfulEntry(element) {
    let parentDiv = element.parentElement;
    let error = parentDiv.querySelector('.error');
    error.innerHTML = '';
    parentDiv.classList.add('success');
    parentDiv.classList.remove('error'); 
}

function nullifySuccessOrFailure(element) {
    let parentDiv = element.parentElement;
    let error = parentDiv.querySelector('.error');
    error.innerHTML = '';
    parentDiv.classList.remove('success');
    parentDiv.classList.remove('error'); 
} 

function forRentalType() {
    RentalTypeSuccessOrFailure();
    viewNumberofRentalsSectionOfEachType();
    nullifySuccessOrFailure(document.getElementById('type-of-rental'));
    nullifySuccessOrFailure(document.getElementById('number-of-apartment-bedrooms'));
    nullifySuccessOrFailure(document.getElementById('type-of-premise'));
    nullifySuccessOrFailure(document.getElementById('number-of-house-bedrooms'));
    nullifySuccessOrFailure(document.getElementById('maximum-occupants'));    
    nullifySuccessOrFailure(document.getElementById('number-of-available-rentals'));
    nullifySuccessOrFailure(document.getElementById('location'));
    nullifySuccessOrFailure(document.getElementById('rental-term'));    
    nullifySuccessOrFailure(document.getElementById('rent'));
    nullifySuccessOrFailure(document.querySelector('.upload-photographs'));     
}

function forRentalType2() {
    RentalTypeSuccessOrFailure();
    viewNumberofRentalsSectionOfEachType();
    document.getElementById('number-of-available-rentals').focus();
}

function RentalTypeSuccessOrFailure(event) {
    const rentalType = document.getElementById('type-of-rental');
    const rentalTypeValue = rentalType.value;  

    if(rentalTypeValue !== "no-value") {
        nullifySuccessOrFailure(rentalType);
        if(event === "submit") {
            return true;
        }
    } else {
        displayError(rentalType, "Please Choose A Type of Rental")
    }    
}

function locationSuccessOrFailure(event) {
    const location = document.getElementById('location');
    const locationValue = location.value;  

    if(locationValue === '') {
        displayError(location, "Please Specify a location");
    } else {
        nullifySuccessOrFailure(location);
        if(event === "submit") {
            return true;
        } 

    }    
}

function rentalTermSuccessorFailure(event) {
    const rentalTerm = document.getElementById('rental-term');
    const rentalTermValue = rentalTerm.value;

    if(rentalTermValue === 'no-value') {
        displayError(rentalTerm, "Please Specify How Often Rent Should Be Paid");
    } else {
        nullifySuccessOrFailure(rentalTerm);
        if(event === "submit") {
            return true;
        }
    }
}

function amountOfRentSuccessOrFailure(event) {
    const amountOfRent = document.getElementById('rent');
    const amountOfRentValue = amountOfRent.value;

    if(amountOfRentValue === '') {
        displayError(amountOfRent, "Please Specify How Much Rent Should Be Paid For Each Term");
    } else {
        if(amountOfRentValue <= 100) {
            displayError(amountOfRent, "Are You Sure About That Amount?");
            const proceed = confirm("Are You Sure About That Amount?");
            if(proceed) {
                nullifySuccessOrFailure(amountOfRent);
                if(event === "submit") {
                    return true;
                }
            }
        } else {
            nullifySuccessOrFailure(amountOfRent);
            if(event === "submit") {
                return true;
            }
        }        
    }
}

function imagesSuccessOrFailure(event) {
    const images = document.getElementById('images-upload');
    const imagesLabel = document.querySelector('.upload-photographs');
    const imagesValue = images.files;
    const rentalType = document.getElementById('type-of-rental');
    const rentalTypeValue = rentalType.value;

    if(imagesValue.length === 0) {
        if(rentalTypeValue === 'no-value') {
            displayError(imagesLabel, "Please Upload Photographs");
        } else {
            displayError(imagesLabel, "Please Upload Photographs of the " + rentalTypeValue + "s");                
        }
    } else {
        nullifySuccessOrFailure(imagesLabel);
        if(event === "submit") {
            return true;
        }
        
    }
}

function forApartmentBedrooms(event) {
    const apartmentBedrooms = document.getElementById('number-of-apartment-bedrooms');        
    const apartmentBedroomsValue = apartmentBedrooms.
    value;
    
    if (apartmentBedroomsValue === 'no-value') {    // No "Number of Bedrooms" Option Chosen
        displayError(apartmentBedrooms, "Please Specify the Number of Bedrooms in Each Apartment");                        
    } else {     
        nullifySuccessOrFailure(apartmentBedrooms);
        if(event === "submit") {
            return true;
        }        
    }
}

function forMoreApartmentBedrooms(event) {
    const moreApartmentBedrooms = document.getElementById('more-apartment-bedrooms');
    const moreApartmentBedroomsValue = moreApartmentBedrooms.value;

    if (moreApartmentBedroomsValue === '') {    // No Value is Entered
        displayError(moreApartmentBedrooms, "Please Specify the Number of Bedrooms in Each Apartment");                        
    } else {     
        nullifySuccessOrFailure(moreApartmentBedrooms);
        if(event === "submit") {
            return true;
        }        
    }
}

function forFinalNumberOfRentals(event) {
    const numberOfRentals = document.getElementById('number-of-available-rentals');
    const numberOfRentalsValue = numberOfRentals.value;
    const rentalType = document.getElementById('type-of-rental');
    const rentalTypeValue = rentalType.value;
    const apartmentBedrooms = document.getElementById('number-of-apartment-bedrooms');
    const apartmentBedroomsValue = apartmentBedrooms.value;
    const moreApartmentBedrooms = document.getElementById('more-apartment-bedrooms');
    const moreApartmentBedroomsValue = moreApartmentBedrooms.value;
    const businessPremise = document.getElementById('type-of-premise');
    const businessPremiseValue = businessPremise.value;
    const houseBedrooms = document.getElementById('number-of-house-bedrooms');
    const moreHouseBedrooms = document.getElementById('more-house-bedrooms');
    const houseBedroomsValue = houseBedrooms.value;
    const moreHouseBedroomsValue = moreHouseBedrooms.value;

    if((rentalTypeValue === 'Hostel') || (rentalTypeValue === 'Bedsitter') || (rentalTypeValue === 'Suite') || (rentalTypeValue === 'Single Room')) {
        if (numberOfRentalsValue === '') {    // No Value is Entered
            displayError(numberOfRentals, "Please Specify the Number of " + rentalTypeValue + "s Available");                        
        } else {
            if((Number(numberOfRentalsValue) > 0) && (Number.isInteger(Number(numberOfRentalsValue)))) {
                nullifySuccessOrFailure(numberOfRentals);
                if(event === "submit") {
                    return true;
                }
            } else {
                displayError(numberOfRentals, "Please Specify A Valid Number of " + rentalTypeValue + "s Available");                        
            }       
        }
    } else if (rentalTypeValue === 'Apartment') {
        if((apartmentBedroomsValue !== 'no-value') && (apartmentBedroomsValue !== 'more')) {
            if (numberOfRentalsValue === '') {    // No Value is Entered
                displayError(numberOfRentals, "Please Specify the Number of " + apartmentBedroomsValue + " Apartments Available");                        
            } else {     
                if((Number(numberOfRentalsValue) > 0) && (Number.isInteger(Number(numberOfRentalsValue)))) {
                    nullifySuccessOrFailure(numberOfRentals);
                    if(event === "submit") {
                        return true;
                    }
                } else {
                    displayError(numberOfRentals, "Please Specify A Valid Number of " + apartmentBedroomsValue + " Apartments Available");                        
                }
            }
        } else {
            if (numberOfRentalsValue === '') {    // No Value is Entered
                displayError(numberOfRentals, "Please Specify the Number of " + moreApartmentBedroomsValue + "-Bedroom Apartments Available");                        
            } else {     
                if((Number(numberOfRentalsValue) > 0) && (Number.isInteger(Number(numberOfRentalsValue)))) {
                    nullifySuccessOrFailure(numberOfRentals);
                    if(event === "submit") {
                        return true;
                    }
                } else {
                    displayError(numberOfRentals, "Please Specify A Valid Number of " + moreApartmentBedroomsValue + "-Bedroom Apartments Available");                        
                }
            }
        }
    } else if (rentalTypeValue === 'Business Premise') {
        if (numberOfRentalsValue === '') {    // No Value is Entered
            if (businessPremiseValue === "Industrial") {
                displayError(numberOfRentals, "Please Specify the Number of " + businessPremiseValue + " Premises Available");
            } else {
                displayError(numberOfRentals, "Please Specify the Number of " + businessPremiseValue + "s Available");
            }                                    
        } else {     
            if((Number(numberOfRentalsValue) > 0) && (Number.isInteger(Number(numberOfRentalsValue)))) {
                nullifySuccessOrFailure(numberOfRentals);
                if(event === "submit") {
                    return true;
                } 
            } else {
                if (businessPremiseValue === "Industrial") {
                    displayError(numberOfRentals, "Please Specify A Valid Number of " + businessPremiseValue + " Premises Available");
                } else {
                    displayError(numberOfRentals, "Please Specify A Valid Number of " + businessPremiseValue + "s Available");
                }
            }
        }
    } else if (rentalTypeValue === 'House') {
        if((houseBedroomsValue !== 'no-value') && (houseBedroomsValue !== 'more')) {
            if (numberOfRentalsValue === '') {    // No Value is Entered
                displayError(numberOfRentals, "Please Specify the Number of " + houseBedroomsValue + " Houses Available");                        
            } else {     
                if((Number(numberOfRentalsValue) > 0) && (Number.isInteger(Number(numberOfRentalsValue)))) {
                    nullifySuccessOrFailure(numberOfRentals);
                    if(event === "submit") {
                        return true;
                    }
                } else {
                    displayError(numberOfRentals, "Please Specify A Valid Number of " + houseBedroomsValue + " Houses Available");                        
                }   
            }
        } else {
            if (numberOfRentalsValue === '') {    // No Value is Entered
                displayError(numberOfRentals, "Please Specify the Number of " + moreHouseBedroomsValue + "-Bedroom Houses Available");                        
            } else {     
                if((Number(numberOfRentalsValue) > 0) && (Number.isInteger(Number(numberOfRentalsValue)))) {
                    nullifySuccessOrFailure(numberOfRentals);
                    if(event === "submit") {
                        return true;
                    }
                } else {
                    displayError(numberOfRentals, "Please Specify A Valid Number of " + moreHouseBedroomsValue + "-Bedroom Houses Available");                        
                }
            }
        }
    }
}

function forBusinessPremises(event) {
    const businessPremise = document.getElementById('type-of-premise');
    const businessPremiseValue = businessPremise.value;
    
    if (businessPremiseValue === 'no-value') {    // No "Business Premise" Option Chosen
        displayError(businessPremise, "Please Specify the Type of Business Premise Available");                        
    } else {     
        nullifySuccessOrFailure(businessPremise);
        if(event === "submit") {
            return true;
        }        
    }
}

function forHouseBedrooms(event) {
    const houseBedrooms = document.getElementById('number-of-house-bedrooms');
    const houseBedroomsValue = houseBedrooms.value;
    
    if (houseBedroomsValue === 'no-value') {    // No "Number of Bedrooms" Option Chosen
        displayError(houseBedrooms, "Please Specify the Number of Bedrooms in Each House");                        
    } else {     
        nullifySuccessOrFailure(houseBedrooms);
        if(event === "submit") {
            return true;
        }        
    }
}

function forMoreHouseBedrooms(event) {
    const moreHouseBedrooms = document.getElementById('more-house-bedrooms');
    const moreHouseBedroomsValue = moreHouseBedrooms.value;

    if (moreHouseBedroomsValue === '') {    // No Value is Entered
        displayError(moreHouseBedrooms, "Please Specify the Number of Bedrooms in Each House");                        
    } else {     
        nullifySuccessOrFailure(moreHouseBedrooms);
        if(event === "submit") {
            return true;
        }        
    }
}

function forMaximumNumberOfOccupants(event) {
    const maximumNumberOfOccupants = document.getElementById('maximum-occupants');
    const maximumNumberOfOccupantsValue = maximumNumberOfOccupants.value;
    const rentalTypeValue = document.getElementById('type-of-rental').value;

    if (maximumNumberOfOccupantsValue === '') {    // No Value is Entered
        displayError(maximumNumberOfOccupants, "Please Specify the Maximum Number of Occupants You Would Allow For Each " + rentalTypeValue + " Available");                        
    } else {     
        if((Number(maximumNumberOfOccupantsValue) > 0) && (Number.isInteger(Number(maximumNumberOfOccupantsValue)))) {
            nullifySuccessOrFailure(maximumNumberOfOccupants);
            if(event === "submit") {
                return true;
            } 
        } else {
            displayError(maximumNumberOfOccupants, "Please Specify A Valid Maximum Number of Occupants");                        
        }
               
    }
}

function forNameOfRental(event) {
    const nameOfRental = document.getElementById('name-of-rental');
    const nameOfRentalValue = nameOfRental.value;

    if(nameOfRentalValue === '') {
        displayError(nameOfRental, "Please Specify The Name Of The Rental You Want To Advertise");
    } else {
        nullifySuccessOrFailure(nameOfRental);
        if(event === 'submit') {
            return true;
        }
    }
}

function validateForm(event) {
    event.preventDefault();

    const nameOfRentalOkay = forNameOfRental('submit');
    const locationOkay = locationSuccessOrFailure('submit');
    const rentalTermOkay = rentalTermSuccessorFailure('submit');
    const amountOfRentOkay = amountOfRentSuccessOrFailure('submit');
    const imagesOkay = imagesSuccessOrFailure('submit');
    const rentalTypeOkay = RentalTypeSuccessOrFailure('submit');

    const apartmentBedroomsOkay = forApartmentBedrooms('submit');
    const moreApartmentBedroomsOkay = forMoreApartmentBedrooms('submit');
    const businessPremiseOkay = forBusinessPremises('submit');
    const houseBedroomsOkay = forHouseBedrooms('submit');
    const moreHouseBedroomsOkay = forMoreHouseBedrooms('submit');

    const numberOfRentalsOkay = forFinalNumberOfRentals('submit');

    const maximumNumberOfOccupantsOkay = forMaximumNumberOfOccupants('submit');


    
    if((nameOfRentalOkay === true) && (locationOkay === true) && (rentalTermOkay === true) && (amountOfRentOkay === true) && (imagesOkay === true) && (rentalTypeOkay === true)) {
        
        const rentalTypeValue = document.getElementById('type-of-rental').value;
        
        if((rentalTypeValue === 'Hostel') || (rentalTypeValue === 'Single Room') || (rentalTypeValue === 'Bedsitter') || (rentalTypeValue === 'Suite')) {
            if((maximumNumberOfOccupantsOkay === true) && (numberOfRentalsOkay === true)) {
                const proceed = confirm("Click \"Ok\" To Submit");
                if(proceed) {
                    alert("Rental Submitted Successfully");
                    document.querySelector('form').submit();
                }
            } 
        } 
        
        
        else if (rentalTypeValue === 'Business Premise') {
            if((businessPremiseOkay === true) && (numberOfRentalsOkay === true)) {
                const proceed = confirm("Click \"Ok\" To Submit");
                if(proceed) {
                    alert("Rental Submitted Successfully");
                    document.querySelector('form').submit();
                }
            }   
        } 
        
        
        else if (rentalTypeValue === 'Apartment') {
            if(apartmentBedroomsOkay === true) {
                const apartmentBedroomsValue = document.getElementById('number-of-apartment-bedrooms').value;
                if(apartmentBedroomsValue === 'more') {
                    if((moreApartmentBedroomsOkay === true) && (numberOfRentalsOkay === true)) {
                        const proceed = confirm("Click \"Ok\" To Submit");
                        if(proceed) {
                            alert("Rental Submitted Successfully");
                            document.querySelector('form').submit();
                        }
                    }
                } else {
                    if(numberOfRentalsOkay === true) {
                        const proceed = confirm("Click \"Ok\" To Submit");
                        if(proceed) {
                            alert("Rental Submitted Successfully");
                            document.querySelector('form').submit();
                        }
                    }
                }                
            } 
        }
        
        
        else if (rentalTypeValue === 'House') {
            if(houseBedroomsOkay === true) {
                const houseBedroomsValue = document.getElementById('number-of-house-bedrooms').value;
                console.log(houseBedroomsValue);
                if(houseBedroomsValue === 'more') {
                    if((moreHouseBedroomsOkay === true) && (numberOfRentalsOkay === true)) {
                        const proceed = confirm("Click \"Ok\" To Submit");
                        if(proceed) {
                            alert("Rental Submitted Successfully");
                            document.querySelector('form').submit();
                        }
                    }
                } else {
                    if(numberOfRentalsOkay === true) {
                        const proceed = confirm("Click \"Ok\" To Submit");
                        if(proceed) {
                            alert("Rental Submitted Successfully");
                            document.querySelector('form').submit();
                        }
                    }
                }                
            } 
        }

        
    }
}

function textareaSizor() {
    const textarea = document.getElementById('description');
    const height = textarea.scrollHeight;
    textarea.style.height = height + 'px';
}