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

function forEmail(event) {
    const email = document.getElementById('email');
    const emailValue = email.value;

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const emailValidity = emailRegex.test(emailValue);

    if(emailValue === '') {
        displayError(email, "Please Enter Your Email Address");
    } else {
        if(emailValidity === true) {
            nullifySuccessOrFailure(email);
            if(event === 'submit') {
                return true;
            }
        } else {
            displayError(email, "Please Enter a Valid Email");
        }
    }
}

function forPassword(event) {
    const password = document.getElementById('passwordField');
    const passwordValue = password.value;

    if(passwordValue === '') {
        displayError(password, "Please Enter Your password");
    } else {
        nullifySuccessOrFailure(password);
        if(event === 'submit') {
            return true;
        }
    }
}

function validateForm(event) {
    event.preventDefault();

    const emailOkay = forEmail('submit');
    const passwordOkay = forPassword('submit');

    if((emailOkay === true) && (passwordOkay === true)) {
        document.getElementById('login-form').submit();
    }
}

function toggleBtwShowingAndHidingPassword() {
    const password = document.getElementById('passwordField');
    const checkbox = document.getElementById('toggle-show-password');

    if(checkbox.checked) {
        password.type = "text";        
    } else {
        password.type = "password"
        
    }        
}

function getEmail(event) {
    event.preventDefault(); // Prevents the default anchor behavior (navigating to a new page)

    let inputValue = document.getElementById("email").value;
    let isEmailValid = forEmail('submit');
    console.log(isEmailValid);
    if (isEmailValid) {
        // Redirect to forgotten-password.php with the value as a query parameter
        window.location.href = "../Php/forgot-password-preparation.php?inputValue=" + encodeURIComponent(inputValue);
    }
}