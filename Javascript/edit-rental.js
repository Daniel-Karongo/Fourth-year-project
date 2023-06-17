function findCurrentImage(arrayOfImages) {
    for(let i=0; i<arrayOfImages.length; i++) {
        if(window.getComputedStyle(arrayOfImages[i]).display !== "none") {
            currentImage = arrayOfImages[i];
            return currentImage;            
        }
    }
}

function viewLeft(imagesCollection, tallyParagraph) {
    let images = document.querySelectorAll(imagesCollection);
    let currentImage; 
    let paragraph = document.querySelector(tallyParagraph);

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

function viewRight(imagesCollection, tallyParagraph) {
    let images = document.querySelectorAll(imagesCollection);
    let currentImage;
    let paragraph = document.querySelector(tallyParagraph);     

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

function textareaSizor() {
    const textarea = document.getElementById('description');
    const height = textarea.scrollHeight;
    textarea.style.height = height + 'px';
}

function zoomDiv(div) {
    div.style.transform = 'scale(1.02, 1.0)';
    div.style.borderColor = '#2C18DE';
    div.style.outline = '2px solid #2C18DE';
}

function unzoomDiv(div) {
    div.style.transform = 'scale(1)';
    div.style.borderColor = '';
    div.style.boxShadow = '0px 0px 5px 2px rgba(0,0,0,0.5)';
    div.style.outline = 'none';
}