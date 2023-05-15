function myRentals() {
    let toView = document.querySelector('.my-rentals');
    let toHide = document.querySelector('.contact-information');
    
    let text = document.querySelectorAll('input');
    text.forEach((input) => {input.value = ""});    // Works for everything except the checkbox
    

    toView.style.display = 'block';
    toHide.style.display = 'none';  
}

function myContactInformation() {
    let toView = document.querySelector('.contact-information');
    let toHide = document.querySelector('.my-rentals');

    toView.style.display = 'block';
    toHide.style.display = 'none';
}