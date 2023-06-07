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
    const userName = document.getElementById('email');
    const userNameValue = userName.value;

    if(userNameValue === '') {
        displayError(userName, "Please Enter Your Email Address");
    } else {
        nullifySuccessOrFailure(userName);
        if(event === 'submit') {
            return true;
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

