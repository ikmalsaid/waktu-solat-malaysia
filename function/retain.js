// Retain Droplist Item After Refresh
// Get the selected option's value before the page refreshes
var selectedState = document.getElementById("state").value;
// Store the selected value in localStorage
localStorage.setItem("selectedState", selectedState);

window.onload = function() {
// Check if there is a stored value in localStorage
    var storedState = localStorage.getItem("selectedState");
    if (storedState) {
    //Set the dropdown list's value to the stored value
        Document.getElementById("state").value = storedState;
    }
}

// on form submit event
var form = document.getElementsByTagName('form')[0];
form.addEventListener("submit", function(event) {
    // Store the selected value in localStorage
    localStorage.setItem("selectedState", document.getElementById("state").value);
});