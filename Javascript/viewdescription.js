function findCurrentImage(arrayOfImages) {
    for(let i=0; i<arrayOfImages.length; i++) {
        if(window.getComputedStyle(arrayOfImages[i]).display !== "none") {
            currentImage = arrayOfImages[i];
            return currentImage;            
        }
    }
}

function viewLeft(imageClass, paragraphId) {
    let images = document.querySelectorAll(imageClass);
    let currentImage; 
    let paragraph = document.querySelector(paragraphId);   

    currentImage = findCurrentImage(images);

    for(let i=0; i<images.length; i++) {
        let imageId = images[i].id;
        let currentImageId = currentImage.id;
        if(imageId === currentImageId) {
            if(i!==0) {
                images[i].style.display = 'none';
                images[i-1].style.display = 'inline';
                paragraph.textContent = "" + i + " of " + images.length;
            } else {
                images[i].style.display = 'none';
                images[images.length-1].style.display = 'inline';
                paragraph.textContent = "" + images.length + " of " + images.length;
            }                                                                     
        }                
    }   
}

function viewRight(imageClass, paragraphId) {
    let images = document.querySelectorAll(imageClass);
    let currentImage;
    let paragraph = document.querySelector(paragraphId);     

    currentImage = findCurrentImage(images);

    for(let i=0; i<images.length; i++) {
        let imageId = images[i].id;
        let currentImageId = currentImage.id;
        if(imageId === currentImageId) {
            if(i!==(images.length-1)) {
                images[i].style.display = 'none';
                images[i+1].style.display = 'inline';
                paragraph.textContent = "" + (i+2) + " of " + images.length;
            } else {
                images[i].style.display = 'none';
                images[0].style.display = 'inline';
                paragraph.textContent = "" + 1 + " of " + images.length;
            }                                                                       
        }                
    } 
}

function zoomDiv(div) {
    // Store the original border color
    var originalBorderColor = div.style.borderColor;

    div.style.transform = 'scale(1.02, 1.0)';
    div.style.borderColor = '#2C18DE';

    // Add the original border color to the div as a data attribute
    div.setAttribute('data-original-border-color', originalBorderColor);
}
  
function unzoomDiv(div) {
    div.style.transform = 'scale(1)';

    // Restore the original border color
    var originalBorderColor = div.getAttribute('data-original-border-color');
    div.style.borderColor = originalBorderColor;
}

function viewContactDetails() {
    let contacts = document.querySelector('.contacts');
    if(contacts.style.display === "none") {
        contacts.style.display = "flex";
    } else {
        contacts.style.display = "none";
    }
}

function viewTenantForm() {
    let tenants = document.querySelector('.tenant-details');
    if(tenants.style.display === "none") {
        tenants.style.display = "flex";
    } else {
        tenants.style.display = "none";
    }
} 

function submitTenantDetails(event) {
    event.preventDefault();
    let contacts = document.querySelector('.tenant-details');
    
    let formData = $(contacts).serialize(); // Serialize form data
    
    $.ajax({
        type: 'POST',
        url: '../Php/submit-tenant-interest.php', // PHP script to handle form submission
        data: formData,
        success: function(response) {
            alert(response);
        }
    });
}










function displayError(element, errorMessage) {
    let parentDiv = element.parentElement;
    let error = parentDiv.querySelector('.error');                
    parentDiv.classList.add('error');
    parentDiv.classList.remove('success');
    error.innerHTML = errorMessage;             
}

function nullifySuccessOrFailure(element) {
    let parentDiv = element.parentElement;
    let error = parentDiv.querySelector('.error');
    error.innerHTML = '';
    parentDiv.classList.remove('success');
    parentDiv.classList.remove('error'); 
}

function validateForm(event) {
    event.preventDefault();

    const nameOkay = validateField('tenants-name', 'Please Give Your Name', 'submit');

    const phoneNumberOkay = validatePhoneNumber('submit');

    const emailOkay = validateEmail('submit');

    if((nameOkay === true) && (phoneNumberOkay === true) && (emailOkay === true)) {
        const proceed = confirm("Are You Sure You Want To Give Your Details?");
        if(proceed) {
            submitTenantDetails(event);
        }        
    }
    
}

function validateField(id, error, event) {
    const field = document.getElementById(id);
    const fieldValue = field.value;

    if(fieldValue === '') {
        displayError(field, error);
    } else {
        nullifySuccessOrFailure(field);
        if((id === 'tenants-name') && (event === 'submit')) {
            return true;
        } else if(id === 'tenants-email') {
            validateEmail();
            if(event === 'submit') {
                const emailOkay = validateEmail(event);
                return emailOkay;
            }
        }
    }
}

function validatePhoneNumber(event) {
    const phoneNumber = document.getElementById('tenants-phone-number');
    const phoneNumberValue = phoneNumber.value;
    const regex = new RegExp('^07[0-9]+$');

    if(phoneNumberValue === '') {
        displayError(phoneNumber, "Please Specify Your Phone Number");
    } else {
        if(phoneNumberValue.length !== 10) {
            displayError(phoneNumber, "Please Enter A Valid Phone Number");
        } else if(regex.test(phoneNumberValue) === false) {
            displayError(phoneNumber, "Please Enter A Valid Format");
        } else {
            nullifySuccessOrFailure(phoneNumber);
            if(event === 'submit') {
                return true;
            }
        }        
    }
}

function validateEmail(event) {
    const email = document.getElementById('tenants-email');
    const emailValue = email.value;
        
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const emailValidity = emailRegex.test(emailValue);    

    if(emailValue !== "") {
        if(emailValidity === true) {
            nullifySuccessOrFailure(email);
            if(event === 'submit') {
                return true;
            }
        } else {
            displayError(email, "Please Enter a Valid Email");
        }
    } else {
        nullifySuccessOrFailure(email);
        if(event === 'submit') {
            return true;
        }
    }
    
}