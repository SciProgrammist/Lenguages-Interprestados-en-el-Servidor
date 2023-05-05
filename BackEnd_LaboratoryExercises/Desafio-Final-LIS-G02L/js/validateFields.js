// To check the form's fields
const form = document.querySelector('form');
const submitBtn = document.querySelector('#submit-btn');



// Adding an event listener for validating the Date of Birth field.
document.getElementById("date-of-birth").addEventListener("change", function() {

  let dateOfBirth = this.value;

  //if it fails in any test then it will send the message, and procede to delete the populated fields.
  if(!validateDateOfBirth(dateOfBirth)) {
    alert("Se debe de ser mayor de edad, para estudiar en la ¡Mejor Universidad en Centro America!");
    this.value = "";
  }

});

// Adding an event listener for validating the month.
document.getElementById("date-of-entry").addEventListener("change", function () {

  let dateField = this.value;

  if(!validateMonthCurrent(dateField)) {
    // If the selected month is not the same as the current mont, show an error message.
    alert("Por favor seleccione una fecha que este dentro del mes.");
    this.value = "";
  }

});



// In order to check all the fields from the main form we use the following event listener. 
form.addEventListener('input', () => {

  // Check if all the required fields have been completed
  const isFormComplete = form.checkValidity();

  // Enable or disable the button based on form completeness
  submitBtn.disabled = !isFormComplete;
});

// Function that verifies that the date's month is the same as the current one.

function validateMonthCurrent(dateString) {

  // Parse the date value into a Date object
  let dateObject = new Date(dateString);

  // Get the month of the selected date
  let selectedMonth = dateObject.getMonth();

  // Get the current month
  let currentMonth = new Date().getMonth();

  if (selectedMonth !== currentMonth) {
    return false;
  } else  {
    return true;
  }

}
// Function that allows to validate that the date is for someone older
function validateDateOfBirth(dateString) {
    // First check for the pattern
    if (!/^\d{4}-\d{2}-\d{2}$/.test(dateString)) {
      return false;
    }
  
    // Parse the date parts to integers
    let parts = dateString.split("-");
    let year = parseInt(parts[0], 10);
    let month = parseInt(parts[1], 10);
    let day = parseInt(parts[2], 10);
  
    // Check the ranges of month and year
    if (year < 1900 || year > new Date().getFullYear() - 18 || month == 0 || month > 12) {
      return false;
    }
  
    // Check the number of days in the month
    let daysInMonth = new Date(year, month, 0).getDate();
    if (day > daysInMonth) {
      return false;
    }
  
    // Calculate age
    let dob = new Date(year, month - 1, day);
    let ageInMilliseconds = Date.now() - dob.getTime();
    let ageDate = new Date(ageInMilliseconds);
    let age = Math.abs(ageDate.getUTCFullYear() - 1970);
  
    // Check if age is at least 18 years
    if (age < 18) return false;

    // Date is valid and user is at least 18 years old
    return true;
  }
  

