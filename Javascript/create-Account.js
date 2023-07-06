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

    const checkbox = document.getElementById('toggle-show-password');
    if(checkbox.checked) {
        createPassword.type = "text";
        confirmPassword.type = "text";        
    } else {
        createPassword.type = "password";
        confirmPassword.type = "password"
        
    }        
}

function validateEmail(event) {
    const email = document.getElementById('email');
    const emailValue = email.value;
        
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const emailValidity = emailRegex.test(emailValue);    

    if(emailValidity === true) {
        nullifySuccessOrFailure(email);
        if(event === 'submit') {
            return true;
        }
    } else {
        displayError(email, "Please Enter a Valid Email");
    }
}

function validatePasswordCreation(event) {
    const field = document.getElementById('create-password');
    const fieldValue = field.value;
    const regex = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W\S]).*$/;

    if(fieldValue.length < 8) {
        displayError(field, "The Password Is Too Short");
    } else {
        if(regex.test(fieldValue) === false) {
            displayError(field, "The Password Must Contain At Least One Of Each Of The Following: lowercase, UPPERCASE, special characters as well as digits");
        } else {
            nullifySuccessOrFailure(field);
            if(event === 'submit') {
                return true;
            }
        }
    }
}

function validatePasswordConfirmation(event) {
    const enterPasswordfield = document.getElementById('create-password');
    const enterPasswordfieldValue = enterPasswordfield.value;

    const confirmPasswordfield = document.getElementById('confirm-password');
    const confirmPasswordfieldValue = confirmPasswordfield.value;

    if(enterPasswordfieldValue !== confirmPasswordfieldValue) {
        displayError(confirmPasswordfield, "The Passwords Do Not Match");
    } else {
        nullifySuccessOrFailure(confirmPasswordfield);
        if(event === 'submit') {
            return true;
        }
    }
}

function validatePhoneNumber(event) {
    const phoneNumber = document.getElementById('phone-number');
    const phoneNumberValue = phoneNumber.value;
    const regex = new RegExp('^07[0-9]+$');

    if(phoneNumberValue === '') {
        displayError(phoneNumber, "Please Specify A Phone Number that will be Associated With Your Rentals");
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

function validateForm(event) {
    event.preventDefault();

    const firstNameOkay = validateField('first-name', 'Please Specify Your First Name', 'submit');

    const lastNameOkay = validateField('last-name', 'Please Specify Your Last Name', 'submit');

    const phoneNumberOkay = validatePhoneNumber('submit');

    const emailOkay = validateField('email', 'Please Specify An Email that will be Associated With Your Rentals', 'submit');

    const createPasswordOkay = validateField('create-password', 'Please Enter A Password To Secure Your Account', 'submit');

    const confirmPasswordOkay = validateField('confirm-password', 'Please Confirm The Password', 'submit');
    
    if((firstNameOkay === true) && (lastNameOkay === true) && (phoneNumberOkay === true) && (emailOkay === true) && (createPasswordOkay === true) && (confirmPasswordOkay === true)) {
        const proceed = confirm("Are You Sure You Want To Create An Account?");
        console.log(proceed);
        if(proceed) {
            alert("An Account Verification Code Will Be Sent To The Email Address You Have Provided. Enter It In The Next Section");
            document.querySelector('form').submit();
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
        if((id === 'first-name') && (event === 'submit')) {
            return true;
        } else if((id === 'last-name') && (event === 'submit')) {
            return true;
        } else if(id === 'email') {
            validateEmail();
            if(event === 'submit') {
                const emailOkay = validateEmail(event);
                return emailOkay;
            }
        } else if (id === 'create-password') {
            validatePasswordCreation();
            if(event === 'submit') {
                const createPasswordOkay = validatePasswordCreation(event);
                return createPasswordOkay;
            }
        } else if (id === 'confirm-password') {
            validatePasswordConfirmation();
            if(event === 'submit') {
                const confirmPasswordOkay = validatePasswordConfirmation(event);
                return confirmPasswordOkay;
            }
        }
    }
}
