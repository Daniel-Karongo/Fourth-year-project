function findCurrentImage(arrayOfImages) {
    for(let i=0; i<arrayOfImages.length; i++) {
        if(window.getComputedStyle(arrayOfImages[i]).display === "inline") {
            currentImage = arrayOfImages[i];
            return currentImage;            
        }
    }
}

function viewLeft() {
    let images = document.querySelectorAll('img.viewimage');
    let currentImage; 
    let paragraph = document.querySelector('#tally-paragraph');   

    currentImage = findCurrentImage(images);

    for(let i=0; i<images.length; i++) {
        let imageId = images[i].id;
        let currentImageId = currentImage.id;
        if(imageId === currentImageId) {
            if(i!==0) {
                images[i].style.display = 'none';
                images[i-1].style.display = 'inline';
                paragraph.textContent = "" + i + " of " + images.length;
            } else {
                images[i].style.display = 'none';
                images[images.length-1].style.display = 'inline';
                paragraph.textContent = "" + images.length + " of " + images.length;
            }                                                                     
        }                
    }   
}

function viewRight() {
    let images = document.querySelectorAll('img.viewimage');
    let currentImage;
    let paragraph = document.querySelector('#tally-paragraph');     

    currentImage = findCurrentImage(images);

    for(let i=0; i<images.length; i++) {
        let imageId = images[i].id;
        let currentImageId = currentImage.id;
        if(imageId === currentImageId) {
            if(i!==(images.length-1)) {
                images[i].style.display = 'none';
                images[i+1].style.display = 'inline';
                paragraph.textContent = "" + (i+2) + " of " + images.length;
            } else {
                images[i].style.display = 'none';
                images[0].style.display = 'inline';
                paragraph.textContent = "" + 1 + " of " + images.length;
            }                                                                       
        }                
    } 
}

function display() {
    const inputField = document.querySelectorAll('.contacts input');
    console.log(inputField);
    inputField.forEach((field) => {
        field.disabled = false;
        field.value = 'ASDFGH';
    });

}