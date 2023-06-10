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