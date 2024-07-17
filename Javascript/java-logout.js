
// Call function when show dialog btn is clicked
document.getElementById("btn-show-editprofile").onclick = function(){show_editmodal()};
var overlayme2 = document.getElementById("editprofile-modal");

function show_editmodal() {
 /* A function to show the dialog window */
    overlayme2.style.display = "flex";
}

// If cancel btn is clicked , the function cancel() is executed
document.getElementById("exit-edit").onclick = function(){canceledit()};
function canceledit() {
 /* code executed if cancel is clicked */  
    overlayme2.style.display = "none";
}



// Sentiment & Logout
// Call function when show dialog btn is clicked
document.getElementById("btn-show-dialog").onclick = function(){show_dialog()};
var overlayme = document.getElementById("dialog-container-review");
var overlayme1 = document.getElementById("dialog-container");

function show_dialog() {
 /* A function to show the dialog window */
    overlayme1.style.display = "block";
}

// LOGOUT
// If confirm btn is clicked , the function confim() is executed
document.getElementById("confirm").onclick = function(){confirm()};
function confirm() {
 /* code executed if confirm is clicked */ 
    overlayme1.style.display = "none";
    overlayme.style.display = "block";  
    
}

// If cancel btn is clicked , the function cancel() is executed
document.getElementById("cancel").onclick = function(){cancel()};
function cancel() {
 /* code executed if cancel is clicked */  
    overlayme1.style.display = "none";
}