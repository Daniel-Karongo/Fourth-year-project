function wrapperFunction(view, hide, tag) {
    toViewAndHide(view, hide);
    if(tag != null){
        clearText(tag);    
    }    
}

function toViewAndHide(view, hide) {
    document.querySelector(view).style.display = 'block';
    document.querySelector(hide).style.display = 'none';   
}

function clearText(tag) {
    let text = document.querySelectorAll(tag);
    text.forEach((input) => {input.value = ""});    // Works for everything except the checkbox
}

function toggleEnabled() {
    const inputFields = document.querySelectorAll('input[type = "text"], input[type = "number"]');
    const passwordField = document.getElementById('password');
    const editDetailsButton = document.getElementsByClassName('edit-details');
    const confirmDetailsButton = document.getElementsByClassName('confirm-button');
    
    inputFields.forEach((inputField) => {
        inputField.disabled = false;
    });
    passwordField.disabled = false;
    
    for (let i = 0; i < confirmDetailsButton.length; i++) {
        confirmDetailsButton[i].style.display = 'block';
    }
    
    for (let i = 0; i < editDetailsButton.length; i++) {
        editDetailsButton[i].style.display = 'none';
    };
}

function toggleShowPassword() {
    const checkbox = document.getElementById('show-pass');
    const password = document.getElementById('password');

    if(checkbox.checked) {
        password.type = "text";        
    } else {
        password.type = "password"
        
    }
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
    const field = document.getElementById('password');
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

function validatePhoneNumber(event) {
    const phoneNumber = document.getElementById('phone');
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

    const createPasswordOkay = validateField('password', 'Please Enter A Password To Secure Your Account', 'submit');

    if((firstNameOkay === true) && (lastNameOkay === true) && (phoneNumberOkay === true) && (emailOkay === true) && (createPasswordOkay === true)) {
        const proceed = confirm("Are You Sure You Want To Create An Account?");
        if(proceed) {
            alert("Account Created Successfully");
            document.querySelector('.contact-information #contact-information-form').submit();
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
        } else if (id === 'password') {
            validatePasswordCreation();
            if(event === 'submit') {
                const confirmPasswordOkay = validatePasswordCreation(event);
                return confirmPasswordOkay;
            }
        }
    }
}

function validateDeletion(event) {
    event.preventDefault();
    const form = event.target;
    
    const proceed = confirm("Are You Sure You Want To Delete This Rental?");
    if(proceed) {
        alert("Rental Deleted");
        form.submit();
    }        
}

function activateAnchor(event) {
    const clickedElement = event.target;
    const form = document.querySelectorAll('.rental-template');
    form.forEach((div) => {
        const descendants = div.querySelectorAll('*');
        descendants.forEach((descendant) => {
            if(descendant === clickedElement) {
                const form = div.querySelector('.edit-details-form');
                form.submit();
            }
        });        
    });
}

function zoomDiv(div) {
    div.style.transform = 'scale(1.02, 1.0)';
    div.style.borderColor = '#2C18DE';
    div.style.outline = '2px solid #2C18DE';
}

function unzoomDiv(div) {
    div.style.transform = 'scale(1)';
    div.style.borderColor = '';
    div.style.boxShadow = '0px 0px 5px 2px rgba(0,0,0,0.5)';
    div.style.outline = 'none';
}

function textareaSizor() {
    const textarea = document.querySelectorAll('.rental-template-description');
    textarea.forEach((element) => {
        elementId = element.id;
        preciseElement = document.getElementById(elementId);
        const height = preciseElement.scrollHeight;
        preciseElement.style.height = height + 'px';
    });    
}