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

function editDetails(event) {
    let element = event.target;
    event.preventDefault();
    let cell = "";
    let row = "";
    let button = "";

    let allInputFields = document.querySelectorAll('.property-owners-table input[type="text"]');
    Array.from(allInputFields).forEach((inputField) => {
        inputField.disabled = true;
        inputField.parentElement.style.backgroundColor = "transparent";
    });
    let allSubmitDetailsDivs = document.querySelectorAll('.property-owners-table .submit-details');
    Array.from(allSubmitDetailsDivs).forEach((td) => {
        td.style.display = "none";
    });
    let editDetailsDiv = document.querySelectorAll('.property-owners-table .edit-details');
    Array.from(editDetailsDiv).forEach((td) => {
        td.style.display = "table-cell";
    });


    if(element.tagName === "BUTTON") {
        cell = element.parentElement;
        row = cell.parentElement;
    } else {
        button = element.parentElement;
        cell = button.parentElement;
        row = cell.parentElement;
    }

    let rowCells = row.querySelectorAll('td');

    Array.from(rowCells).forEach((rowcell) => {
        rowcell.style.backgroundColor = "rgba(255, 255, 255 , 0.2)";
    });

    rowCells.forEach(element => {
        Array.from(element.children).forEach((child) => {
            if(child.tagName === "INPUT") {
                child.disabled = false;
            }
        });
    });

    submitDetailsDiv = row.querySelectorAll('.submit-details');
    Array.from(submitDetailsDiv).forEach((td) => {
        td.style.display = "block";
    });
    cell.style.display = "none";
}

function confirmPropertyOwnerEdit(event) {
    event.preventDefault();
    const proceed = confirm("Are You Sure You Want To Edit This Property Owner's Details?");
    if(proceed) {
        document.querySelector('form').submit();
    }
}

function textareaSizor() {
    const hashedpasswordinput = document.querySelector('#hashed-password-return');
    const passwordinput = document.querySelector('#password-to-hash');
    const inputWidth = 400;
  
    hashedpasswordinput.style.width = inputWidth + 'px';
    passwordinput.style.width = inputWidth + 'px';
  
    requestAnimationFrame(function () {
      const hashedPasswordWidth = hashedpasswordinput.scrollWidth;
      const passwordWidth = passwordinput.scrollWidth;
      const maxWidth = Math.max(hashedPasswordWidth, passwordWidth);
  
      if (maxWidth > inputWidth) {
        hashedpasswordinput.style.width = maxWidth + 10 + 'px';
        passwordinput.style.width = maxWidth + 10 + 'px';
      }
    });
}
  
  

