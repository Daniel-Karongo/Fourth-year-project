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
