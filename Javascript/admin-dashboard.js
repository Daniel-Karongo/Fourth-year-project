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

function editDetails(event, allInputs, rowSubmit, rowEdit) {
    let element = event.target;
    event.preventDefault();
    let cell = "";
    let row = "";
    let button = "";

    let allInputFields = document.querySelectorAll(allInputs);
    Array.from(allInputFields).forEach((inputField) => {
        inputField.readOnly = true;
        inputField.parentElement.style.backgroundColor = "transparent";
    });
    let allSubmitDetailsDivs = document.querySelectorAll(rowSubmit);
    Array.from(allSubmitDetailsDivs).forEach((td) => {
        td.style.display = "none";
    });
    let editDetailsDiv = document.querySelectorAll(rowEdit);
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
                child.readOnly = false;
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
    let form = event.target;
    const proceed = confirm("Are You Sure You Want To Edit This Property Owner's Details?");
    if(proceed) {
        form.submit();
    }
}

function confirmAdministratorEdit(event) {
    event.preventDefault();
    let form = event.target;
    const proceed = confirm("Are You Sure You Want To Edit This Administrator's Details?");
    if(proceed) {
        form.submit();
    }
}

function confirmAdminDelete(event) {
    event.preventDefault();
    const proceed = confirm("Are You Sure You Want To Delete Your Account?");
    if(proceed) {
        document.querySelector('#delete-admin-account').submit();
    }
}

function textareaSizorbody() {
    textareaSizor('#hashed-password-return-admin', '#password-to-hash-admin');
    textareaSizor('#hashed-password-return-property-owner', '#password-to-hash-property-owner');
}

function textareaSizor(hashedReturn, input) {
    const hashedpasswordinput = document.querySelector(hashedReturn);
    const passwordinput = document.querySelector(input);
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

function viewOwnerDetails(event, ownerClass) {
    event.preventDefault();
    element = event.target;

    let cell = "";
    let row = "";
    let table = "";
    let button = "";

    if(element.tagName === "BUTTON") {
        cell = element.parentElement;
        row = cell.parentElement;
        table = row.parentElement;
    } else {
        button = element.parentElement;
        cell = button.parentElement;
        row = cell.parentElement;
        table = row.parentElement;
    }
    splitCellId = cell.id.split("-");
    index = splitCellId[splitCellId.length - 1];
    
    let entries = table.querySelectorAll('tr');
    Array.from(entries).forEach((entry) => {
        if((entry.className.includes("extra-details")) && (entry.id.split("-").includes(index)) && (entry.id.split("-").includes(ownerClass))) {
            if(entry.style.display === "table-row") {
                entry.style.display = "none";
            } else {
                entry.style.display = "table-row";
            }
        }   
    });
}
  
function toViewAndHide(button, collection, view, hide, displaytype, direction) {
    let toHide = hide.split(", ");
    
    document.querySelector(view).style.display = displaytype;
    let allButtons = document.querySelectorAll(collection);
    Array.from(allButtons).forEach((specificButton) => {
        specificButton.style.backgroundColor = "transparent";
    })

    document.querySelector(button).style.backgroundColor = "#2C18DE";

    toHide.forEach((div) => {
        document.querySelector(div).style.display = 'none';
        if((displaytype === "flex") && (direction !== "row")) {
            document.querySelector(view).style.flexDirection = "column";
        } else {
            document.querySelector(view).style.flexDirection = "row";
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

function toggleShowPassword(checkboxInput, passwordField) {
    const checkbox = document.getElementById(checkboxInput);
    const password = document.getElementById(passwordField);

    if(checkbox.checked) {
        password.type = "text";        
    } else {
        password.type = "password"
        
    }
}

function validateEmail(event, id) {
    const email = document.getElementById(id);
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

function validatePasswordCreation(event, id) {
    const field = document.getElementById(id);
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

function validatePhoneNumber(event, id, error) {
    let phoneNumber = document.getElementById(id);
    let phoneNumberValue = phoneNumber.value;
    let regex = new RegExp('^07[0-9]+$');

    if(phoneNumberValue === '') {
        displayError(phoneNumber, error);
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

function validateForm(event, div, form) {
    event.preventDefault();

    if(div === "contact-information-form") {
        const firstNameOkay = validateField('first-name', 'Please Specify Your First Name', 'submit', 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password');
        const lastNameOkay = validateField('last-name', 'Please Specify Your Last Name', 'submit', 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password');

        const phoneNumberOkay = validatePhoneNumber('submit', 'phone', "Please Enter A Phone Number That Will Be Associated With Your Account");

        const emailOkay = validateField('email', 'Please Specify An Email that will be Associated With Your Account', 'submit', 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password');

        const createPasswordOkay = validateField('password', 'Please Enter A Password To Secure Your Account', 'submit', 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password');

        if((firstNameOkay === true) && (lastNameOkay === true) && (phoneNumberOkay === true) && (emailOkay === true) && (createPasswordOkay === true)) {
            const proceed = confirm("Are You Sure You Want To Edit Your Account Details?");
            if(proceed) {
                document.querySelector(form).submit();
            }        
        }
    } else if (div === "add-new-admin-form") {
        const firstNameOkay = validateField('new-admin-first-name', 'Please Specify The New Admin\'s First Name', 'submit', 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password');
        
        const lastNameOkay = validateField('new-admin-last-name', 'Please Specify The New Admin\'s Last Name', 'submit', 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password');

        const phoneNumberOkay = validatePhoneNumber('submit', 'new-admin-phone', "Please Enter A Phone Number That Will Be Associated With The New Admin's Account");

        const emailOkay = validateField('new-admin-email', 'Please Specify An Email that will be Associated With The New Admin\'s Rentals', 'submit', 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password');

        const createPasswordOkay = validateField('new-admin-password', 'Please Enter A Password To Secure The New Admin\'s Account', 'submit', 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password');

        if((firstNameOkay === true) && (lastNameOkay === true) && (phoneNumberOkay === true) && (emailOkay === true) && (createPasswordOkay === true)) {
            const proceed = confirm("Are You Sure You Want To Add A New Administrator?");
            if(proceed) {
                document.querySelector(form).submit();
            }        
        }
    } else {
        const firstNameOkay = validateField('new-property-owner-first-name', 'Please Specify The New Property Owner\'s First Name', 'submit', 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password');
        
        const lastNameOkay = validateField('new-property-owner-last-name', 'Please Specify The New Property Owner\'s Last Name', 'submit', 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password');

        const phoneNumberOkay = validatePhoneNumber('submit', 'new-property-owner-phone', "Please Enter A Phone Number That Will Be Associated With The New Property Owner's Account");

        const emailOkay = validateField('new-property-owner-email', 'Please Specify An Email that will be Associated With The New Property Owner\'s Rentals', 'submit', 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password');

        const createPasswordOkay = validateField('new-property-owner-password', 'Please Enter A Password To Secure The New Property Owner\'s Account', 'submit', 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password');

        if((firstNameOkay === true) && (lastNameOkay === true) && (phoneNumberOkay === true) && (emailOkay === true) && (createPasswordOkay === true)) {
            const proceed = confirm("Are You Sure You Want To Add A New Property Owner?");
            if(proceed) {
                document.querySelector(form).submit();
            }        
        }
    }
}

function validateField(id, error, event, firstName, lastName, email, email, email, password, password, password) {
    const field = document.getElementById(id);
    const fieldValue = field.value;

    if(fieldValue === '') {
        displayError(field, error);
    } else {
        nullifySuccessOrFailure(field);
        if((id === firstName) && (event === 'submit')) {
            return true;
        } else if((id === lastName) && (event === 'submit')) {
            return true;
        } else if(id === email) {
            validateEmail(null, email);
            if(event === 'submit') {
                const emailOkay = validateEmail(event, email);
                return emailOkay;
            }
        } else if (id === password) {
            validatePasswordCreation(null, password);
            if(event === 'submit') {
                const confirmPasswordOkay = validatePasswordCreation(event, password);
                return confirmPasswordOkay;
            }
        }
    }
}

function confirmAdminForget(event) {
    event.preventDefault();
    const proceed = confirm("Are You Sure? This Will force you to enter your credentials every time you want to log into your account.");
    if(proceed) {
        event.target.submit();
    }
}

function viewLandlordRentals(event) {
    event.preventDefault();
    element = event.target;

    let cell = "";
    let row = "";
    let table = "";
    let button = "";

    if(element.tagName === "BUTTON") {
        cell = element.parentElement;
        row = cell.parentElement;
        table = row.parentElement;
    } else {
        button = element.parentElement;
        cell = button.parentElement;
        row = cell.parentElement;
        table = row.parentElement;
    }
    splitCellId = cell.id.split("-");
    index = splitCellId[splitCellId.length - 1];
    
    let entries = table.querySelectorAll('tr');
    Array.from(entries).forEach((entry) => {
        if((entry.className.includes("extra-landlord-details-of-rentals")) && (entry.id.split("-").includes(index))) {
            if(entry.style.display === "table-row") {
                entry.style.display = "none";
            } else {
                entry.style.display = "table-row";
            }
        }   
    });
}

function showInputInField(input) {
    let outputField = document.querySelector('#view-input-details-clearly');

    const inputWidth = 200;
    outputField.style.width = inputWidth + 'px';
    outputField.value = input.value;
  
    requestAnimationFrame(function () {
      const inputFieldWidth = input.scrollWidth;
      const maxWidth = Math.max(inputFieldWidth, inputWidth);
  
      if (maxWidth > inputWidth) {
        outputField.style.width = maxWidth + 10 + 'px';
      }
    });
}

function submitDeleteAccountForm(form) {
    let propertyOwner = document.getElementById(form);
    
    const proceed = confirm("Are You Sure You Want To Delete This Property Owners Account. This will erase everything about him/her as well as delete all the rentals he/she had uploaded");
    if(proceed) {
        let formData = $(propertyOwner).serialize(); // Serialize form data
    
        $.ajax({
            type: 'POST',
            url: '../Php/landlord-account-deleter.php', // PHP script to handle form submission
            data: formData,
            success: function(response) {
                alert(response);
            }
        });
    }
    
}