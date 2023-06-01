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
    numberofAvailableLabel.innerHTML = "";
    numberofAvailableLabel.innerHTML += ("Number of Available " + selectedOption + suffix); 
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

function validateForm(event) {
    event.preventDefault();

    // const form = document.getElementById('form');
    const rentalType = document.getElementById('type-of-rental');

    const apartmentBedrooms = document.getElementById('number-of-apartment-bedrooms');
    const moreApartmentBedrooms = document.getElementById('more-apartment-bedrooms');

    const houseBedrooms = document.getElementById('number-of-house-bedrooms');
    const moreHouseBedrooms = document.getElementById('more-house-bedrooms');
    
    const businessPremise = document.getElementById('type-of-premise');

    const numberOfRentals = document.getElementById('number-of-available-rentals');
    const maximumNumberOfOccupants = document.getElementById('maximum-occupants');

    const location = document.getElementById('location');
    const rentalTerm = document.getElementById('rental-term');
    const amountOfRent = document.getElementById('rent');
    const images = document.getElementById('images-upload');
    const imagesLabel = document.querySelector('.upload-photographs');

    formValidator();

    function formValidator() {
        const rentalTypeValue = rentalType.value;
        const maximumNumberOfOccupantsValue = maximumNumberOfOccupants.value;
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
        } 
        
        
        else if ((rentalTypeValue === 'Hostel') || (rentalTypeValue === 'Bedsitter') || (rentalTypeValue === 'Single Room') || (rentalTypeValue === 'Suite')) {
            if (numberOfRentalsValue === '') {
                displayError(numberOfRentals, "Please Specify the Number of " + rentalTypeValue + "s"); 
                successfulEntry(rentalType);
                if (maximumNumberOfOccupantsValue === '') {
                    displayError(maximumNumberOfOccupants, "Please Specify the Maximum Number of Occupants For Each " + rentalTypeValue);                  
                } else {                    
                    successfulEntry(maximumNumberOfOccupants);
                }

            } else {
                successfulEntry(rentalType);
                successfulEntry(numberOfRentals);
                if (maximumNumberOfOccupantsValue === '') {
                    displayError(maximumNumberOfOccupants, "Please Specify the Maximum Number of Occupants For Each " + rentalTypeValue);                  
                } else {                    
                    successfulEntry(maximumNumberOfOccupants);
                }
            }
        } 
        
        
        else if (rentalTypeValue === 'Apartment') {
            if (apartmentBedroomsValue === 'no-value') {    // No "Number of Bedrooms" Option Chosen
                displayError(apartmentBedrooms, "Please Specify the Number of Bedrooms in Each " + rentalTypeValue);
                successfulEntry(rentalType);                
            } 
            
            else if (apartmentBedroomsValue === 'more') {   // "More" option is chosen
                if (moreApartmentBedroomsValue == '') {
                    displayError(moreApartmentBedrooms, "Please Specify the Number of Bedrooms in Each " + rentalTypeValue); successfulEntry(rentalType);
                    successfulEntry(apartmentBedrooms);                    
                } else {
                    successfulEntry(rentalType);
                    successfulEntry(apartmentBedrooms);
                    successfulEntry(moreApartmentBedrooms);
                    if (numberOfRentalsValue === '') {
                        displayError(numberOfRentals, "Please Specify the Number of " + moreApartmentBedroomsValue + "-Bedroom Apartments");                   
                    } else {                    
                        successfulEntry(numberOfRentals);
                    }
                }
            } 
            
            else {      // For "1/2/3 - Bedroom" Apartments
                successfulEntry(rentalType);
                successfulEntry(apartmentBedrooms);
                if (numberOfRentalsValue === '') {
                    displayError(numberOfRentals, "Please Specify the Number of " + apartmentBedroomsValue + " Apartments");                   
                } else {                    
                    successfulEntry(numberOfRentals);
                }
            }
        } 
        
        
        else if (rentalTypeValue === 'Business Premise') {
            if (businessPremiseValue === 'no-value') {
                displayError(businessPremise, "Please Specify the Type Of Business Premise");
                successfulEntry(rentalType);                
            } else {
                successfulEntry(rentalType);
                successfulEntry(businessPremise);
                if (numberOfRentalsValue === '') {
                    displayError(numberOfRentals, "Please Specify the Number of " + businessPremiseValue + "s");                   
                } else {                    
                    successfulEntry(numberOfRentals);
                }
            }
        } 
        

        else {      // For "House"
            if (houseBedroomsValue === 'no-value') {       // For "No-value" Option
                displayError(houseBedrooms, "Please Specify the Number of Bedrooms in Each " + rentalTypeValue);
                successfulEntry(rentalType);


            } else if (houseBedroomsValue === 'more') {     // For "More"
                if (moreHouseBedroomsValue == '') {
                    displayError(moreHouseBedrooms, "Please Specify the Number of Bedrooms In Each " + rentalTypeValue);
                    successfulEntry(rentalType);
                    successfulEntry(houseBedrooms);                    
                } else {
                    successfulEntry(rentalType);
                    successfulEntry(houseBedrooms);
                    successfulEntry(moreHouseBedrooms);
                    if (numberOfRentalsValue === '') {
                        displayError(numberOfRentals, "Please Specify the Number of " + moreHouseBedroomsValue + "-Bedroom Houses");                   
                    } else {                    
                        successfulEntry(numberOfRentals);
                    }                    
                }


            } else {        // For "1/2/3"-Bedroom Houses
                successfulEntry(rentalType);
                successfulEntry(houseBedrooms);
                if (numberOfRentalsValue === '') {
                    displayError(numberOfRentals, "Please Specify the Number of " + houseBedroomsValue + " Houses");                   
                } else {                    
                    successfulEntry(numberOfRentals);
                }
            }
        }

        if(locationValue === '') {
            displayError(location, "Please Specify a location");
        } else {
            successfulEntry(location);
        }


        if(rentalTermValue === 'no-value') {
            displayError(rentalTerm, "Please Specify How Often Rent Should Be Paid");
        } else {
            successfulEntry(rentalTerm);
        }


        if(amountOfRentValue === '') {
            displayError(amountOfRent, "Please Specify How Much Rent Should Be Paid For Each Term");
        } else {
            successfulEntry(amountOfRent);
        }


        if(imagesValue.length === 0) {
            if(rentalTypeValue === 'no-value') {
                displayError(imagesLabel, "Please Upload Photographs");
            } else {
                displayError(imagesLabel, "Please Upload Photographs of the " + rentalTypeValue + "s");                
            }
            
        } else {
            successfulEntry(imagesLabel);
        }

    }
}

function forRentalType() {
    RentalTypeSuccessOrFailure();
    viewNumberofRentalsSectionOfEachType();
}

function RentalTypeSuccessOrFailure() {
    const rentalType = document.getElementById('type-of-rental');
    const rentalTypeValue = rentalType.value;  

    if(rentalTypeValue !== "no-value") {
        successfulEntry(rentalType);
    } else {
        displayError(rentalType, "Please Choose A Type of Rental")
    }    
}

// function forHostelsBedsittersSuitesAndSingleRooms() {
//     const rentalType = document.getElementById
//     ('type-of-rental');
//     const numberOfRentals = document.getElementById
//     ('number-of-available-rentals');
//     const maximumNumberOfOccupants = document.getElementById
//     ('maximum-occupants');
    
//     const rentalTypeValue = rentalType.value;
//     const maximumNumberOfOccupantsValue = 
//     maximumNumberOfOccupants.value;
//     const numberOfRentalsValue = numberOfRentals.value;

//     if (numberOfRentalsValue === '') {
//         displayError(numberOfRentals, "Please Specify the Number of " + rentalTypeValue + "s"); 
//         successfulEntry(rentalType);
//         if (maximumNumberOfOccupantsValue === '') {
//             displayError(maximumNumberOfOccupants, "Please Specify the Maximum Number of Occupants For Each " + rentalTypeValue);                  
//         } else {                    
//             successfulEntry(maximumNumberOfOccupants);
//         }

//     } else {
//         successfulEntry(rentalType);
//         successfulEntry(numberOfRentals);
//         if (maximumNumberOfOccupantsValue === '') {
//             displayError(maximumNumberOfOccupants, "Please Specify the Maximum Number of Occupants For Each " + rentalTypeValue);                  
//         } else {                    
//             successfulEntry(maximumNumberOfOccupants);
//         }
//     }
// }

function locationSuccessOrFailure() {
    const location = document.getElementById('location');
    const locationValue = location.value;  

    if(locationValue === '') {
        displayError(location, "Please Specify a location");
    } else {
        successfulEntry(location);
    }    
}

function rentalTermSuccessorFailure() {
    const rentalTerm = document.getElementById('rental-term');
    const rentalTermValue = rentalTerm.value;

    if(rentalTermValue === 'no-value') {
        displayError(rentalTerm, "Please Specify How Often Rent Should Be Paid");
    } else {
        successfulEntry(rentalTerm);
    }
}

function amountOfRentSuccessOrFailure() {
    const amountOfRent = document.getElementById('rent');
    const amountOfRentValue = amountOfRent.value;

    if(amountOfRentValue === '') {
        displayError(amountOfRent, "Please Specify How Much Rent Should Be Paid For Each Term");
    } else {
        successfulEntry(amountOfRent);
    }
}

function imagesSuccessOrFailure() {
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
        successfulEntry(imagesLabel);
    }
}

function forApartmentBedrooms() {
    const apartmentBedrooms = document.getElementById('number-of-apartment-bedrooms');        
    const apartmentBedroomsValue = apartmentBedrooms.
    value;
    
    if (apartmentBedroomsValue === 'no-value') {    // No "Number of Bedrooms" Option Chosen
        displayError(apartmentBedrooms, "Please Specify the Number of Bedrooms in Each Apartment");                        
    } else {     
        successfulEntry(apartmentBedrooms);        
    }
}

function forMoreApartmentBedrooms() {
    const moreApartmentBedrooms = document.getElementById('more-apartment-bedrooms');
    const moreApartmentBedroomsValue = moreApartmentBedrooms.value;

    if (moreApartmentBedroomsValue === '') {    // No Value is Entered
        displayError(moreApartmentBedrooms, "Please Specify the Number of Bedrooms in Each Apartment");                        
    } else {     
        successfulEntry(moreApartmentBedrooms);        
    }
}

function forFinalNumberOfRentals() {
    const numberOfRentals = document.getElementById('number-of-available-rentals');
    const numberOfRentalsValue = numberOfRentals.value;
    const rentalType = document.getElementById('type-of-rental');
    const rentalTypeValue = rentalType.value;
    // const apartmentBedroomsValue = apartmentBedrooms.value;
    // const moreApartmentBedroomsValue = moreApartmentBedrooms.value;
    // const houseBedroomsValue = houseBedrooms.value;
    // const moreHouseBedroomsValue = moreHouseBedrooms.value;
    // const businessPremiseValue = businessPremise.value;

    if (numberOfRentalsValue === '') {    // No Value is Entered
        displayError(numberOfRentals, "Please Specify the Number of " +rentalTypeValue + "s Available");                        
    } else {     
        successfulEntry(numberOfRentals);        
    }
}

function forBusinessPremises() {
    const businessPremise = document.getElementById('type-of-premise');
    const businessPremiseValue = businessPremise.value;
    
    if (businessPremiseValue === 'no-value') {    // No "Business Premise" Option Chosen
        displayError(businessPremise, "Please Specify the Type of Business Premise Available");                        
    } else {     
        successfulEntry(businessPremise);        
    }
}

function forHouseBedrooms() {
    const houseBedrooms = document.getElementById('number-of-house-bedrooms');
    const houseBedroomsValue = houseBedrooms.value;
    
    if (houseBedroomsValue === 'no-value') {    // No "Number of Bedrooms" Option Chosen
        displayError(houseBedrooms, "Please Specify the Number of Bedrooms in Each House");                        
    } else {     
        successfulEntry(houseBedrooms);        
    }
}

function forMoreHouseBedrooms() {
    const moreHouseBedrooms = document.getElementById('more-house-bedrooms');
    const moreHouseBedroomsValue = moreHouseBedrooms.value;

    if (moreHouseBedroomsValue === '') {    // No Value is Entered
        displayError(moreHouseBedrooms, "Please Specify the Number of Bedrooms in Each House");                        
    } else {     
        successfulEntry(moreHouseBedrooms);        
    }
}