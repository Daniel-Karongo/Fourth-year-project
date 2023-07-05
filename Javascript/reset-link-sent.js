function alertNotification() {
    alert("Email Sent Successfully");
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

function validateForm(event) {
    event.preventDefault();

    let confirmationCodeInput = document.getElementById('confirmation-code');
    let code = confirmationCodeInput.value;
  
    // Remove non-digit characters
    code = code.replace(/\D/g, '');
    
    // Check if the code has exactly six digits
    let isValid = /^\d{6}$/.test(code);
    
    // Set the validity state of the input
    if(isValid != false ) {
        nullifySuccessOrFailure(confirmationCodeInput);
        document.querySelector('form').submit();
    } else {
        displayError(confirmationCodeInput, "Please Enter a Valid Code Format (6 digits)");
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