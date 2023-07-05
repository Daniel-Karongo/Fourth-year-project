function validateForm(event) {
    event.preventDefault();

    isPasswordOkay = validatePasswordCreation('submit');
    isConfirmationOkay = validatePasswordConfirmation('submit');

    if ((isPasswordOkay === true) && (isConfirmationOkay === true)) {
        document.querySelector('form').submit();
    } 
}

function validatePasswordCreation(event) {
    const field = document.getElementById('password');
    const fieldValue = field.value;
    const regex = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W\S]).*$/;

    if(fieldValue.length !== 0) {
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
    } else {
        displayError(field, "Please Enter A Password");
    }
    
}

function validatePasswordConfirmation(event) {
    const enterPasswordfield = document.getElementById('password');
    const enterPasswordfieldValue = enterPasswordfield.value;

    const confirmPasswordfield = document.getElementById('password-confirmation');
    const confirmPasswordfieldValue = confirmPasswordfield.value;

    if(confirmPasswordfieldValue.length !== 0){
        if(enterPasswordfieldValue !== confirmPasswordfieldValue) {
            displayError(confirmPasswordfield, "The Passwords Do Not Match");
        } else {
            nullifySuccessOrFailure(confirmPasswordfield);
            if(event === 'submit') {
                return true;
            }
        }
    } else {
        displayError(confirmPasswordfield, "Please Enter A Password");
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

function zoomDiv(div) {
    // Store the original border color
    var originalBorderColor = div.style.borderColor;

    div.style.transform = 'scale(1.02, 1.0)';
    div.style.borderColor = '#2C18DE';
    div.style.outline = '2px solid #2C18DE';

    // Add the original border color to the div as a data attribute
    div.setAttribute('data-original-border-color', originalBorderColor);
}
  
function unzoomDiv(div) {
    div.style.transform = 'scale(1)';

    // Restore the original border color
    var originalBorderColor = div.getAttribute('data-original-border-color');
    div.style.borderColor = originalBorderColor;

    div.style.outline = 'none';
}

function forPasswordCreationFocus(event) {
    let div = document.getElementById('password');
    zoomDiv(div);
    validatePasswordCreation(event);
}

function forPasswordCreationBlur(event) {
    let div = document.getElementById('password');
    zoomDiv(div);
    validatePasswordCreation(event);
}

function forPasswordConfirmationFocus(event) {
    let div = document.getElementById('password-confirmation');
    validatePasswordConfirmation(event);
    zoomDiv(div);
}

function forPasswordConfirmationBlur(event) {
    let div = document.getElementById('password-confirmation');
    validatePasswordConfirmation(event);
    unzoomDiv(div);
}