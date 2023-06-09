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