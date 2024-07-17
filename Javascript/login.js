const passwordField = document.querySelector("#pass");
const eyeIcon= document.querySelector("#eye");

eyeIcon.addEventListener('click', function(e){
    this.classList.toggle("fa-eye-slash");
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
  })