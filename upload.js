function basicInformation() {
    let toView = document.querySelector('.basic-information');
    let toHide = document.querySelector('.optional-information');
    
    let text = document.querySelectorAll('input');
    text.forEach((input) => {input.value = ""});    // Works for everything except the checkbox
    
    toView.style.display = 'block';
    toHide.style.display = 'none';  
}

function optionalInformation() {
    let toView = document.querySelector('.optional-information');
    let toHide = document.querySelector('.basic-information');

    toView.style.display = 'block';
    toHide.style.display = 'none';
}