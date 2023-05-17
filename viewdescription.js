function viewLeft() {
    let images = document.querySelectorAll('img.viewimage');
    let currentImage;    

    for(let i=0; i<images.length; i++) {
        if(window.getComputedStyle(images[i]).display === "inline") {
            currentImage = images[i];            
        }
    }

    for(let i=0; i<images.length; i++) {
        let imageId = images[i].id;
        let currentImageId = currentImage.id;
        if(imageId === currentImageId) {
            if(i!==0) {
                images[i].style.display = 'none';
                images[i-1].style.display = 'inline';
            } else {
                images[i].style.display = 'none';
                images[images.length-1].style.display = 'inline';
            }                                                                     
        }                
    }   
}

function viewRight() {
    let images = document.querySelectorAll('img.viewimage');
    let currentImage;    

    for(let i=0; i<images.length; i++) {
        if(window.getComputedStyle(images[i]).display === "inline") {
            currentImage = images[i];            
        }
    }

    for(let i=0; i<images.length; i++) {
        let imageId = images[i].id;
        let currentImageId = currentImage.id;
        if(imageId === currentImageId) {
            if(i!==(images.length-1)) {
                images[i].style.display = 'none';
                images[i+1].style.display = 'inline';
            } else {
                images[i].style.display = 'none';
                images[0].style.display = 'inline';
            }                                                                       
        }                
    } 
}