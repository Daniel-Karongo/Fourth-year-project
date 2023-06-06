const form = document.getElementById('form');
const rentalType = document.getElementById('type-of-rental');
const numberOfRentals = document.getElementById('number-of-available-rentals');
const location = document.getElementById('location');
const rentalTerm = document.getElementById('rental-term');
const amountOfRent = document.getElementById('rent');
const description = document.getElementById('description');
const images = document.getElementById('images-upload');


form.addEventListener('submit', event=> {
    event.preventDefault();
    validateForm();
});

function validateForm() {
    const typeOfRental = rentalType.value;
    alert(typeOfRental);
}