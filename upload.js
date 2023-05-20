function basicInformation() {
    let toView = document.querySelector('.basic-information');
    let toHide = document.querySelector('.optional-information');
    
    let text = document.querySelectorAll('input');
    text.forEach((input) => {input.value = ""});    // Works for everything except the checkbox
    
    toView.style.display = 'block';
    toHide.style.display = 'none';  
}

function optionalInformation() {
    let toView = document.querySelector('.optional-information');
    let toHide = document.querySelector('.basic-information');

    toView.style.display = 'block';
    toHide.style.display = 'none';
}

function viewNumberofRentals() {
    let selectedOption = document.querySelector('#type-of-rental').value;   // The Option Selected
    let numberofAvailableRentals = document.querySelector('#number-of-available-rentals');
    let numberofAvailableLabel = document.querySelector('.number-of-available-rentals');    // The label for the "Number of Available Rentals" input field
    let numberofRentalsInput = document.querySelectorAll('.number-of-available-rentals');   // The whole "Number of Available Rentals" section, both the label and the input field
    let toView;    
    
    if (selectedOption !== 'no-value') {
        if ((selectedOption !== 'Apartment') && (selectedOption !== 'Business Premise') && (selectedOption !== 'House'))    // If the option selected is not "Apartment", "Business Premise" or "House" 
        {
            toView = document.querySelectorAll('.type-of-business-premise, .number-of-house-bedrooms, .more-apartment-bedrooms, .more-house-bedrooms, .number-of-apartment-bedrooms');
            toView.forEach((element) => {
                element.style.display = 'none';     // Hide whatever other sections (Business Premise or House) that may be displayed
                element.selectedIndex = 0; 
            });
            numberofRentalsInput.forEach((element) => {
                element.style.display = 'block';    //Display the whole "Number of Available Rentals" section           
            }); 
            numberofAvailableLabel.innerHTML = "";  // Clear whatever is on the "Number of Available Rentals" label
            numberofAvailableLabel.innerHTML += ("Number of Available " + selectedOption + "s");    // Replace the text of the "Number of Available Rentals" label with "Number of Available ..."
            numberofAvailableRentals.value = null;      // Clear what input may have ben entered to the "Number of Available Rentals" section            

        } else if (selectedOption === 'Apartment') // If the option chosen is "Apartment"
        {
            toView = document.querySelectorAll('.type-of-business-premise, .number-of-house-bedrooms, .more-apartment-bedrooms, .more-house-bedrooms, .number-of-available-rentals');
            toView.forEach((element) => {
                element.style.display = 'none';     // Hide whatever other sections (Business Premise or House) that may be displayed
                element.selectedIndex = 0; 
            });
            toView = document.querySelectorAll('.number-of-apartment-bedrooms');            
            toView.forEach((element) => {
                element.style.display = 'block';    // Unhide the section where the user specifies the number of bedrooms in the apartment.  
            });
            numberofAvailableRentals.value = null;      // Clear what input may have ben entered to the "Number of Available Rentals" section            

        } else if (selectedOption === 'Business Premise') // If the option choses is "Business Premise"
        {
            toView = document.querySelectorAll('.number-of-apartment-bedrooms,.number-of-house-bedrooms, .more-apartment-bedrooms, .more-house-bedrooms, .number-of-available-rentals');
            toView.forEach((element) => {
                element.style.display = 'none';     // Hide whatever other sections (Apartment or House) that may be displayed
                element.selectedIndex = 0;
            });
            toView = document.querySelectorAll('.type-of-business-premise');
            console.log(toView);
            toView.forEach((element) => {
                element.style.display = 'block';    // Unhide the section where the user specifies the type of business premise.
                numberofAvailableRentals.value = null;      // Clear what input may have ben entered to the "Number of Available Rentals" section
            });            

        } else if (selectedOption === 'House') {
            toView = document.querySelectorAll('.number-of-apartment-bedrooms, .type-of-business-premise, .more-apartment-bedrooms, .more-house-bedrooms, .number-of-available-rentals');
            toView.forEach((element) => {
                element.style.display = 'none';     // Hide whatever other sections (Business Premise or Apartment) that may be displayed
                element.selectedIndex = 0;
            });
            toView = document.querySelectorAll('.number-of-house-bedrooms');
            console.log(toView);
            toView.forEach((element) => {
                element.style.display = 'block';    // Unhide the section where the user specifies the number of bedrooms in the house.
            });
            numberofAvailableRentals.value = null;      // Clear what input may have ben entered to the "Number of Available Rentals" section.

        }
               
    } else {
        numberofRentalsInput.forEach((element) => {
            element.style.display = 'none';     // Hide the "Number of Available Rentals" section if the default option is what is selected
        });
        numberofAvailableRentals.value = null;      // Clear what input may have ben entered to the "Number of Available Rentals" section
        
    }    
}

function moreApartmentBedrooms() {
    let selectedOption = document.querySelector('#number-of-apartment-bedrooms').value;     // The option selected (1-bedroom etc)
    let moreApartmentBedrooms = document.querySelectorAll('.more-apartment-bedrooms');      // The "How many" section if more than 3 bedroms
    let numberofAvailableLabel = document.querySelector('.number-of-available-rentals');    // The "Number of Avalable Rentals" section
    let numberofRentalsInput = document.querySelectorAll('.number-of-available-rentals');       // The label of the section above ("Number of Avalable Rentals")  
    
    if (selectedOption !== 'no-value') {    // If no option is selected
        if (selectedOption === 'more') {    // For "more" bedrooms
            moreApartmentBedrooms.forEach((element) => {
                element.style.display = 'block';    // Display the section that specifies how many bedrooms are in the apartment.             
            });
            numberofRentalsInput.forEach((element) => {
                element.style.display = 'none';                
            });     // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
            numberofAvailableLabel.innerHTML = "";
            numberofAvailableLabel.innerHTML += ("Number of Available " + selectedOption + " Apartments");                     

        } else {    // If some option is chosen that is not the default not the "more" values.
            moreApartmentBedrooms.forEach((element) => {
                element.style.display = 'none';     // Hide the section where the user specifies the number of bedrooms if greater than 3.          
            });  
            numberofRentalsInput.forEach((element) => {
                element.style.display = 'block';        // Display the section (final) where the user specifies the total number of rentals available of the chosen type.
                numberofAvailableLabel.innerHTML = "";
                numberofAvailableLabel.innerHTML += ("Number of Available " + selectedOption + " Apartments");  
            });
            document.querySelector('#more-apartment-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.            

        }
    } else {    // If no option is chosen by the user. 
        numberofRentalsInput.forEach((element) => {
            element.style.display = 'none';     // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.           
        });
        moreApartmentBedrooms.forEach((element) => {
            element.style.display = 'none';     // Hide the section where the user specifies the number of bedrooms if greater than 3.          
        });
        document.querySelector('#more-apartment-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.
        
    }    
}

function moreHouseBedrooms() {
    let selectedOption = document.querySelector('#number-of-house-bedrooms').value;     // The option selected (1-bedroom etc)
    let moreHouseBedrooms = document.querySelectorAll('.more-house-bedrooms');      // The "How many" section if more than 3 bedroms
    let numberofAvailableLabel = document.querySelector('.number-of-available-rentals');    // The "Number of Avalable Rentals" section
    let numberofRentalsInput = document.querySelectorAll('.number-of-available-rentals');       // The label of the section above ("Number of Avalable Rentals")  
    
    if (selectedOption !== 'no-value') {    // If no option is selected
        if (selectedOption === 'more') {    // For "more" bedrooms
            moreHouseBedrooms.forEach((element) => {
                element.style.display = 'block';    // Display the section that specifies how many bedrooms are in the house.             
            });
            numberofRentalsInput.forEach((element) => {
                element.style.display = 'none';                
            });     // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.
            numberofAvailableLabel.innerHTML = "";
            numberofAvailableLabel.innerHTML += ("Number of Available " + selectedOption + " Houses");
            
        } else {    // If some option is chosen that is not the default not the "more" values.
            moreHouseBedrooms.forEach((element) => {
                element.style.display = 'none';     // Hide the section where the user specifies the number of bedrooms if greater than 3.          
            });  
            numberofRentalsInput.forEach((element) => {
                element.style.display = 'block';    // Display the section (final) where the user specifies the total number of rentals available of the chosen type.
                numberofAvailableLabel.innerHTML = "";
                numberofAvailableLabel.innerHTML += ("Number of Available " + selectedOption + " Houses");  
            });
            document.querySelector('#more-house-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.

        }
    } else {    // If no option is chosen by the user. 
        numberofRentalsInput.forEach((element) => {
            element.style.display = 'none';     // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.           
        });
        moreHouseBedrooms.forEach((element) => {
            element.style.display = 'none';     // Hide the section where the user specifies the number of bedrooms if greater than 3.          
        });
        document.querySelector('#more-house-bedrooms').value = null;    // Clear whatever value may have been entered into the "How many" section of the apartment.
    }    
}

function viewNumberofBusinessPremises() {
    let selectedOption = document.querySelector('#type-of-premise').value;     // The option selected (stall, shop etc)
    let numberofAvailableLabel = document.querySelector('.number-of-available-rentals');    // The "Number of Avalable Rentals" section
    let numberofRentalsInput = document.querySelectorAll('.number-of-available-rentals');       // The label of the section above ("Number of Avalable Rentals")  
    
    if (selectedOption !== 'no-value')      // If no option is selected
    {    
        numberofRentalsInput.forEach((element) => {
            element.style.display = 'block';            
        });     // Display the section (final) where the user specifies the total number of rentals available of the chosen type.
        numberofAvailableLabel.innerHTML = "";
        if (selectedOption !== 'Industrial') {
            numberofAvailableLabel.innerHTML += ("Number of Available " + selectedOption + "s");
        } else {
            numberofAvailableLabel.innerHTML += ("Number of Available " + selectedOption + " Premises");
        }        

    } else {    // If no option is chosen by the user. 
        numberofRentalsInput.forEach((element) => {
            element.style.display = 'none';     // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.           
        });

    }
}

function displayTheNumberOfApartments() {
    let enteredValue = document.querySelector('#more-apartment-bedrooms').value;     // The number of bedrooms manualy added.
    let numberofAvailableLabel = document.querySelector('.number-of-available-rentals');    // The "Number of Avalable Rentals" section
    let numberofRentalsInput = document.querySelectorAll('.number-of-available-rentals');       // The label of the section above ("Number of Avalable Rentals")  
    
    if (enteredValue !== "")      // If some value is entered
    {    
        numberofRentalsInput.forEach((element) => {
            element.style.display = 'block';            
        });     // Display the section (final) where the user specifies the total number of rentals available of the chosen type.
        numberofAvailableLabel.innerHTML = "";
        numberofAvailableLabel.innerHTML += ("Number of Available " + enteredValue + "-Bedroom Apartments");                           
    } else {    // If no value has beeen entered by the user. 
        numberofRentalsInput.forEach((element) => {
            element.style.display = 'none';     // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.            
        });        
    }
}

function displayTheNumberOfHouses() {
    let enteredValue = document.querySelector('#more-house-bedrooms').value;     // The number of bedrooms manualy added.
    let numberofAvailableLabel = document.querySelector('.number-of-available-rentals');    // The "Number of Avalable Rentals" section
    let numberofRentalsInput = document.querySelectorAll('.number-of-available-rentals');       // The label of the section above ("Number of Avalable Rentals")  
    
    if (enteredValue !== "")      // If some value is entered
    {    
        numberofRentalsInput.forEach((element) => {
            element.style.display = 'block';            
        });     // Display the section (final) where the user specifies the total number of rentals available of the chosen type.
        numberofAvailableLabel.innerHTML = "";
        numberofAvailableLabel.innerHTML += ("Number of Available " + enteredValue + "-Bedroom Houses");                           
    } else {    // If no value has beeen entered by the user. 
        numberofRentalsInput.forEach((element) => {
        element.style.display = 'none';     // Hide the section (final) where the user specifies the total number of rentals available of the chosen type.            
        });        
    }
}