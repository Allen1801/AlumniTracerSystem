const passwordField = document.querySelector("#mainpass");
const passwordField1 = document.querySelector("#cpass");
const passwordField2 = document.querySelector("#currentpass");
const eyeIcon = document.querySelector("#eye");
const eyeIcon1 = document.querySelector("#eye1");
const eyeIcon2 = document.querySelector("#eye2");

//Main Password
eyeIcon.addEventListener('click', function(e){
    this.classList.toggle("fa-eye-slash");
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
  })

  //Confirm Password
  eyeIcon1.addEventListener('click', function(e){
    this.classList.toggle("fa-eye-slash");
    const type = passwordField1.getAttribute("type") === "password" ? "text" : "password";
    passwordField1.setAttribute("type", type);
  })
  
    eyeIcon2.addEventListener('click', function(e){
    this.classList.toggle("fa-eye-slash");
    const type = passwordField2.getAttribute("type") === "password" ? "text" : "password";
    passwordField2.setAttribute("type", type);
  })