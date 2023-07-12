function zoomDiv(div) {
    // Store the original border color
    var originalBorderColor = div.style.borderColor;

    div.style.transform = 'scale(1.02, 1.0)';
    div.style.borderColor = '#2C18DE';
    div.style.outline = '2px solid #2C18DE';

    // Add the original border color to the div as a data attribute
    div.setAttribute('data-original-border-color', originalBorderColor);
}
  
function unzoomDiv(div, event) {
    div.style.transform = 'scale(1)';

    // Restore the original border color
    var originalBorderColor = div.getAttribute('data-original-border-color');
    div.style.borderColor = originalBorderColor;

    div.style.outline = 'none';
}

function editDetails(event) {
    let element = event.target;
    event.preventDefault();
    let cell = "";
    let row = "";
    let button = "";

    let allInputFields = document.querySelectorAll('.property-owners-table input[type="text"]');
    Array.from(allInputFields).forEach((inputField) => {
        inputField.disabled = true;
        inputField.parentElement.style.backgroundColor = "transparent";
    });
    let allSubmitDetailsDivs = document.querySelectorAll('.property-owners-table .submit-details');
    Array.from(allSubmitDetailsDivs).forEach((td) => {
        td.style.display = "none";
    });
    let editDetailsDiv = document.querySelectorAll('.property-owners-table .edit-details');
    Array.from(editDetailsDiv).forEach((td) => {
        td.style.display = "table-cell";
    });


    if(element.tagName === "BUTTON") {
        cell = element.parentElement;
        row = cell.parentElement;
    } else {
        button = element.parentElement;
        cell = button.parentElement;
        row = cell.parentElement;
    }

    let rowCells = row.querySelectorAll('td');

    Array.from(rowCells).forEach((rowcell) => {
        rowcell.style.backgroundColor = "rgba(255, 255, 255 , 0.2)";
    });

    rowCells.forEach(element => {
        Array.from(element.children).forEach((child) => {
            if(child.tagName === "INPUT") {
                child.disabled = false;
            }
        });
    });

    submitDetailsDiv = row.querySelectorAll('.submit-details');
    Array.from(submitDetailsDiv).forEach((td) => {
        td.style.display = "block";
    });
    cell.style.display = "none";
}

function confirmPropertyOwnerEdit(event) {
    event.preventDefault();
    const proceed = confirm("Are You Sure You Want To Edit This Property Owner's Details?");
    if(proceed) {
        document.querySelector('form').submit();
    }
}

function textareaSizor() {
    const hashedpasswordinput = document.querySelector('#hashed-password-return');
    const passwordinput = document.querySelector('#password-to-hash');
    const inputWidth = 400;
  
    hashedpasswordinput.style.width = inputWidth + 'px';
    passwordinput.style.width = inputWidth + 'px';
  
    requestAnimationFrame(function () {
      const hashedPasswordWidth = hashedpasswordinput.scrollWidth;
      const passwordWidth = passwordinput.scrollWidth;
      const maxWidth = Math.max(hashedPasswordWidth, passwordWidth);
  
      if (maxWidth > inputWidth) {
        hashedpasswordinput.style.width = maxWidth + 10 + 'px';
        passwordinput.style.width = maxWidth + 10 + 'px';
      }
    });
}
  
function toViewAndHide(button, view, hide, displaytype) {
    let toHide = hide.split(", ");
    
    document.querySelector(view).style.display = displaytype;
    let allButtons = document.querySelectorAll('.control-panel button');
    Array.from(allButtons).forEach((specificButton) => {
        specificButton.style.backgroundColor = "transparent";
    })

    document.querySelector(button).style.backgroundColor = "#2C18DE";

    toHide.forEach((div) => {
        document.querySelector(div).style.display = 'none';
        if(displaytype === "flex") {
            document.querySelector(view).style.flexDirection = "column";
        }
    });
}

function nullifySuccessOrFailure(element) {
    let parentDiv = element.parentElement;
    let error = parentDiv.querySelector('.error');
    error.innerHTML = '';
    parentDiv.classList.remove('success');
    parentDiv.classList.remove('error'); 
}

function displayError(element, errorMessage) {
    let parentDiv = element.parentElement;
    let error = parentDiv.querySelector('.error');                
    parentDiv.classList.add('error');
    parentDiv.classList.remove('success');
    error.innerHTML = errorMessage;             
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

function toggleShowPassword() {
    const checkbox = document.getElementById('show-pass');
    const password = document.getElementById('password');

    if(checkbox.checked) {
        password.type = "text";        
    } else {
        password.type = "password"
        
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
        const proceed = confirm("Are You Sure You Want To Edit Your Account Details?");
        if(proceed) {
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