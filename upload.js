function clearText(tag) {
    let text = document.querySelectorAll(tag);
    text.forEach((input) => {input.value = ""});    // Works for everything except the checkbox
}

function toViewAndHide(view, hide, displaytype) {
    document.querySelector(view).style.display = displaytype;
    document.querySelector(hide).style.display = 'none';
    if(displaytype === "flex") {
        document.querySelector(view).style.flexDirection = "column";
    }   
}

function wrapperFunction(view, displaytype, hide, tag) {
    toViewAndHide(view, hide, displaytype);
    if(tag != null){
        clearText(tag);    
    }    
}

function toViewAndHideMultiplesections(toHideArg, toViewArg) {
    toHide = document.querySelectorAll(toHideArg);
    toHide.forEach((element) => {
        element.style.display = 'none';     
        element.selectedIndex = 0; 
    });
    toView = document.querySelectorAll(toViewArg);            
    toView.forEach((element) => {
        element.style.display = 'flex';
        element.style.flexDirection = "column";

    });
}

function clearLabel(numberofAvailableLabel, selectedOption, suffix) {
    numberofAvailableLabel.innerHTML = "";
    numberofAvailableLabel.innerHTML += ("Number of Available " + selectedOption + suffix); 
}

function viewNumberofRentalsSectionOfEachType() {
    let selectedOption = document.querySelector('#type-of-rental').value;   // The Option Selected    
    let numberofAvailableLabel = document.querySelector('.number-of-available-rentals');    // The label for the "Number of Available Rentals" input field     
    
    if (selectedOption !== 'no-value') {
        if ((selectedOption !== 'Apartment') && (selectedOption !== 'Business Premise') && (selectedOption !== 'House'))    // If the option selected is not "Apartment", "Business Premise" or "House" 
        {
            toViewAndHideMultiplesections(('.businessPremiseType, .houseBedrooms, .moreHouseBedrooms, .apartmentBedrooms, .moreApartmentBedrooms'), ('.numberOfAvailableRentals, .maximumNumberOfOccupants'));
            
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
        toViewAndHideMultiplesections('.apartmentBedrooms, .moreApartmentBedrooms, .businessPremiseType, .houseBedrooms, .moreHouseBedrooms, .numberOfAvailableRentals, .maximumNumberOfOccupants, .error', null);
        // Hide the "Number of Available Rentals" section if the default option is what is selected.

    }
    
    document.querySelector('#number-of-available-rentals').value = null;      // Clear what input may have ben entered to the "Number of Available Rentals" section.            
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
            
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Apartments");
            document.querySelector('#more-apartment-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.            

        }
    } else {    // If no option is chosen by the user.
        toViewAndHideMultiplesections(('.moreApartmentBedrooms', 
        '.numberOfAvailableRentals'), null); 
        // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.           
        // Hide the section where the user specifies the number of bedrooms if greater than 3.          
        
        document.querySelector('#more-apartment-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.

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

        }
    } else {    // If no option is chosen by the user. 
        toViewAndHideMultiplesections(('.moreHouseBedrooms', 
        '.numberOfAvailableRentals'), null);
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

        if (selectedOption !== 'Industrial') {
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, "s");             
        } else {
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Premises");            
        }        

    } else {    // If no option is chosen by the user. 
        toViewAndHideMultiplesections('.numberOfAvailableRentals', null);
       // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
    }

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
}


function validateForm(event) {
    event.preventDefault();

    // const form = document.getElementById('form');
    const rentalType = document.getElementById('type-of-rental');

    const apartmentBedrooms = document.getElementById('number-of-apartment-bedrooms');
    const moreApartmentBedrooms = document.getElementById('more-apartment-bedrooms');

    const moreHouseBedrooms = document.getElementById('more-house-bedrooms');
    const houseBedrooms = document.getElementById('number-of-house-bedrooms');

    const businessPremise = document.getElementById('type-of-premise');

    const numberOfRentals = document.getElementById('number-of-available-rentals');
    const location = document.getElementById('location');
    const rentalTerm = document.getElementById('rental-term');
    const amountOfRent = document.getElementById('rent');
    const images = document.getElementById('images-upload');
    const imagesLabel = document.querySelector('.upload-photographs');

    formValidator();

    function displayError(element, errorMessage) {
        let parentDiv = element.parentElement;
        let error = parentDiv.querySelector('.error');
        error.innerHTML = errorMessage;        
        parentDiv.classList.add('error');
        parentDiv.classList.remove('success');             
    }

    function successfulEntry(element) {
        let parentDiv = element.parentElement;
        let error = parentDiv.querySelector('.error');
        error.innerHTML = '';
        parentDiv.classList.add('success');
        parentDiv.classList.remove('error'); 
    }

    function formValidator() {
        const rentalTypeValue = rentalType.value;
        const numberOfRentalsValue = numberOfRentals.value;
        const locationValue = location.value;
        const rentalTermValue = rentalTerm.value;
        const amountOfRentValue = amountOfRent.value;
        const imagesValue = images.files;

        const apartmentBedroomsValue = apartmentBedrooms.value;
        const moreApartmentBedroomsValue = moreApartmentBedrooms.value;

        const houseBedroomsValue = houseBedrooms.value;
        const moreHouseBedroomsValue = moreHouseBedrooms.value;

        const businessPremiseValue = businessPremise.value;
        
              
        

        if(rentalTypeValue === 'no-value') {
            displayError(rentalType, "Please Choose A Type of Rental");
        } else if ((rentalTypeValue === 'Hostel') || (rentalTypeValue === 'Bedsitter') || 
        (rentalTypeValue === 'Single Room') || 
        (rentalTypeValue === 'Suite')) {
            if (numberOfRentalsValue === '') {
                displayError(numberOfRentals, "Please Specify the Number of " + rentalTypeValue + "s"); 
                successfulEntry(rentalType);
            } else {
                successfulEntry(numberOfRentals);
            }
        } else if (rentalTypeValue === 'Apartment') {
            if (apartmentBedroomsValue === 'no-value') {
                displayError(apartmentBedrooms, "Please Specify the Number of Bedrooms in Each " + rentalTypeValue);                
            } else if (apartmentBedroomsValue === 'more') {
                if (moreApartmentBedroomsValue === '') {
                    displayError(moreApartmentBedrooms, "Please Specify the Number of Bedrooms in Each " + rentalTypeValue);
                } else {
                    successfulEntry(moreApartmentBedrooms);
                }
            } else {
                successfulEntry(apartmentBedrooms);
            }
        } else if (rentalTypeValue === 'Business Premise') {
            if (businessPremiseValue === 'no-value') {
                displayError(businessPremise, "Please Specify the Type Of Business Premise");                
            } else {
                successfulEntry(businessPremise);
            }
        } else {
            // const houseBedroomsValue = houseBedrooms.value;
            // const moreHouseBedroomsValue = moreHouseBedrooms.value;
            if (houseBedroomsValue === 'no-value') {
                displayError(houseBedrooms, "Please Specify the Number of Bedrooms in Each " + rentalTypeValue);                
            } else if (houseBedroomsValue === 'more') {
                if (moreHouseBedroomsValue === '') {
                    displayError(moreHouseBedrooms, "Please Specify the Number of Bedrooms in Each " + rentalTypeValue);
                } else {
                    successfulEntry(moreHouseBedrooms);
                }
            } else {
                successfulEntry(houseBedrooms);
            }
        }

        

        if(locationValue === '') {
            displayError(location, "Please Specify a location");
        } else {
            successfulEntry(location);
        }

        if(rentalTermValue === 'no-value') {
            displayError(rentalTerm, "Please Specify How Often The Rent Should Be Paid");
        } else {
            successfulEntry(rentalTerm);
        }

        if(amountOfRentValue === '') {
            displayError(amountOfRent, "Please Specify How Much Rent Should Be Paid For Each Term");
        } else {
            successfulEntry(amountOfRent);
        }

        if(imagesValue.length === 0) {
            displayError(imagesLabel, "Please Upload Photographs of the " + rentalTermValue + "s");
        } else {
            successfulEntry(imagesLabel);
        }

    }
}

