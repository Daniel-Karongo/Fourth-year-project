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
    const enterPasswordfield = document.getElementById('password');
    const enterPasswordfieldValue = enterPasswordfield.value;

    const confirmPasswordfield = document.getElementById('password-confirmation');
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