//Logout
// Call function when show dialog btn is clicked
document.getElementById("btn-show-dialog").onclick = function(){show_dialog()};
var overlayme1 = document.getElementById("dialog-container");

function show_dialog() {
 /* A function to show the dialog window */
    overlayme1.style.display = "block";
}

// If cancel btn is clicked , the function cancel() is executed
document.getElementById("cancel").onclick = function(){cancel()};
function cancel() {
 /* code executed if cancel is clicked */  
    overlayme1.style.display = "none";
}


//PASSWORD
// Call function when show dialog btn is clicked
document.getElementById("btn-show-dialog-pass").onclick = function(){show_dialogpass()};
var overlayme = document.getElementById("dialog-container-pass");
var password = document.getElementById("password");

function show_dialogpass() {
 /* A function to show the dialog window */
    overlayme.style.display = "block";
}

// LOGOUT
// If confirm btn is clicked , the function confim() is executed
document.getElementById("confirm-pass").onclick = function(){confirmpass()};
function confirmpass() {
 /* code executed if confirm is clicked */ 
    if(password == "admin"){
        window.open("admin_settings.php", "_self");
    }
}

// If cancel btn is clicked , the function cancel() is executed
document.getElementById("cancel-pass").onclick = function(){cancelpass()};
function cancelpass() {
 /* code executed if cancel is clicked */  
    overlayme.style.display = "none";
}