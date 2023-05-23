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
        element.style.display = 'block';    
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
            toViewAndHideMultiplesections(('.type-of-business-premise, .number-of-house-bedrooms, .more-apartment-bedrooms, .more-house-bedrooms, .number-of-apartment-bedrooms'), '.number-of-available-rentals'); 
            numberofAvailableLabel.innerHTML = "";  // Clear whatever is on the "Number of Available Rentals" label
            numberofAvailableLabel.innerHTML += ("Number of Available " + selectedOption + "s");    // Replace the text of the "Number of Available Rentals" label with "Number of Available ..."            

        } else if (selectedOption === 'Apartment') // If the option chosen is "Apartment"
        {
            toViewAndHideMultiplesections(('.type-of-business-premise, .number-of-house-bedrooms, .more-apartment-bedrooms, .more-house-bedrooms, .number-of-available-rentals'), '.number-of-apartment-bedrooms');    // Hide whatever other sections (Business Premise or House) that may be displayed
            // Unhide the section where the user specifies the number of bedrooms in the apartment.              

        } else if (selectedOption === 'Business Premise') // If the option choses is "Business Premise"
        {
            toViewAndHideMultiplesections(('.number-of-apartment-bedrooms,.number-of-house-bedrooms, .more-apartment-bedrooms, .more-house-bedrooms, .number-of-available-rentals'), '.type-of-business-premise');
            // Hide whatever other sections (Apartment or House) that may be displayed
            // Unhide the section where the user specifies the type of business premise.            

        } else if (selectedOption === 'House') {
            toViewAndHideMultiplesections(('.number-of-apartment-bedrooms, .type-of-business-premise, .more-apartment-bedrooms, .more-house-bedrooms, .number-of-available-rentals'), '.number-of-house-bedrooms'); 
            // Unhide the section where the user specifies the number of bedrooms in the house.

        }
               
    } else {
        toViewAndHideMultiplesections('.number-of-available-rentals', null);
        // Hide the "Number of Available Rentals" section if the default option is what is selected.

    }
    
    document.querySelector('#number-of-available-rentals').value = null;      // Clear what input may have ben entered to the "Number of Available Rentals" section.            
}

function viewNumberOfSpecificApartmentBedrooms() {
    let selectedOption = document.querySelector('#number-of-apartment-bedrooms').value;     // The option selected (1-bedroom etc)
      
    if (selectedOption !== 'no-value') {    // If no option is selected
        if (selectedOption === 'more') {    // For "more" bedrooms
            toViewAndHideMultiplesections('.number-of-available-rentals', '.more-apartment-bedrooms');
            // Display the section that specifies how many bedrooms are in the apartment.             
            // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Apartments");

        } else {    // If some option is chosen that is not the default not the "more" values.
            toViewAndHideMultiplesections('.more-apartment-bedrooms', '.number-of-available-rentals');
            // Hide the section where the user specifies the number of bedrooms if greater than 3.          
            // Display the section (final) where the user specifies the total number of rentals available of the chosen type.                  
            
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Apartments");
            document.querySelector('#more-apartment-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.            

        }
    } else {    // If no option is chosen by the user.
        toViewAndHideMultiplesections(('.more-apartment-bedrooms', 
        '.number-of-available-rentals'), null); 
        // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.           
        // Hide the section where the user specifies the number of bedrooms if greater than 3.          
        
        document.querySelector('#more-apartment-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.

    }    
}

function viewNumberofSpecificHouseBedrooms() {
    let selectedOption = document.querySelector('#number-of-house-bedrooms').value;     // The option selected (1-bedroom etc)
        
    if (selectedOption !== 'no-value') {    // If no option is selected
        if (selectedOption === 'more') {    // For "more" bedrooms
            toViewAndHideMultiplesections('.number-of-available-rentals', '.more-house-bedrooms');
            // Display the section that specifies how many bedrooms are in the house.             
            // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Houses");           
            
        } else {    // If some option is chosen that is not the default and not the "more" values.
            toViewAndHideMultiplesections('.more-house-bedrooms', '.number-of-available-rentals');
            // Hide the section where the user specifies the number of bedrooms if greater than 3.          
            // Display the section (final) where the user specifies the total number of rentals available of the chosen type.
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Houses");
            document.querySelector('#more-house-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.

        }
    } else {    // If no option is chosen by the user. 
        toViewAndHideMultiplesections(('.more-house-bedrooms', 
        '.number-of-available-rentals'), null);
        // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.           
        // Hide the section where the user specifies the number of bedrooms if greater than 3.          
        document.querySelector('#more-house-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.
    }    
}

function viewNumberofSpecificBusinessPremises() {
    let selectedOption = document.querySelector('#type-of-premise').value;     // The option selected (stall, shop etc)      
    
    if (selectedOption !== 'no-value')      // If no option is selected
    {    
        toViewAndHideMultiplesections(null, '.number-of-available-rentals');
        // Display the section (final) where the user specifies the total number of rentals available of the chosen type.

        if (selectedOption !== 'Industrial') {
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, "s");             
        } else {
            clearLabel(document.querySelector('.number-of-available-rentals'), selectedOption, " Premises");            
        }        

    } else {    // If no option is chosen by the user. 
        toViewAndHideMultiplesections('.number-of-available-rentals', null);
       // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
    }

}

function specifyTheFinalTheNumberOfApartments() {
    let enteredValue = document.querySelector('#more-apartment-bedrooms').value;     // The number of bedrooms manualy added.
        
    if (enteredValue !== "")      // If some value is entered
    {    
        toViewAndHideMultiplesections(null, '.number-of-available-rentals'); 
        // Display the section (final) where the user specifies the total number of rentals available of the chosen type.
        clearLabel(document.querySelector('.number-of-available-rentals'), enteredValue, "-Bedroom Apartments");

    } else {    // If no value has beeen entered by the user. 
        toViewAndHideMultiplesections('.number-of-available-rentals', null);
        // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.

    }
}

function specifyTheFinalTheNumberOfHouses() {
    let enteredValue = document.querySelector('#more-house-bedrooms').value;     // The number of bedrooms manualy added.
    let numberofAvailableLabel = document.querySelector('.number-of-available-rentals');    // The "Number of Avalable Rentals" section
    let numberofRentalsInput = document.querySelectorAll('.number-of-available-rentals');       // The label of the section above ("Number of Avalable Rentals")  
    
    if (enteredValue !== "")      // If some value is entered
    {    
        toViewAndHideMultiplesections(null, '.number-of-available-rentals'); 
        // Display the section (final) where the user specifies the total number of rentals available of the chosen type.        
        clearLabel(document.querySelector('.number-of-available-rentals'), enteredValue, "-Bedroom Houses");
                                 
    } else {    // If no value has beeen entered by the user. 
        toViewAndHideMultiplesections('.number-of-available-rentals', null); 
        // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
    }
}