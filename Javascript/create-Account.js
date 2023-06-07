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

function toggleBtwShowingAndHidingPassword() {
    const createPassword = document.getElementById('create-password');
    const confirmPassword = document.getElementById('confirm-password');

    if ((createPassword.type === "password") || (confirmPassword.type === "password")) {
        createPassword.type = "text";
        confirmPassword.type = "text";
    } else {
        createPassword.type = "password";
        confirmPassword.type = "password"
    }    
}

function validateEmail() {
    const email = document.getElementById('email');
    const emailValue = email.value;
        
    // Use a regular expression to validate the email address
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const emailValidity = emailRegex.test(emailValue);    

    if(emailValidity) {
        nullifySuccessOrFailure(email);
    } else {
        displayError(email, "Please Enter a Valid Email");
    }
}

function validateField(id, error) {
    const field = document.getElementById(id);
    const fieldValue = field.value;

    if(fieldValue === '') {
        displayError(field, error);
    } else {
        nullifySuccessOrFailure(field);
    }
}

function validatePhoneNumber() {
    const phoneNumber = document.getElementById('phone-number');
    const phoneNumberValue = phoneNumber.value;

    if(phoneNumberValue === '') {
        displayError(phoneNumber, "Please Specify A Phone Number that will be Associated With Your Rentals");
    } else {
        console.log(typeof phoneNumberValue.length);
        if(phoneNumberValue.length !== 10) {
            displayError(phoneNumber, "Please Enter A Valid Phone Number");
        } else {
            nullifySuccessOrFailure(phoneNumber);
        }        
    }
}