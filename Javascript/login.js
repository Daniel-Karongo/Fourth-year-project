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

function forEmail() {
    const userName = document.getElementById('email-username');
    const userNameValue = userName.value;

    if(userNameValue === '') {
        displayError(userName, "Please Enter Your Email Address");
    } else {
        nullifySuccessOrFailure(userName);
    }
}

function forPassword() {
    const password = document.getElementById('password');
    const passwordValue = password.value;

    if(passwordValue === '') {
        displayError(password, "Please Enter Your password");
    } else {
        nullifySuccessOrFailure(password);
    }
}

function validateForm(event) {
    event.preventDefault();
    forEmail();
    forPassword();
}

