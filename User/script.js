const forms = document.querySelector(".forms"),
pwShowHide = document.querySelectorAll(".eye-icon"),
links = document.querySelectorAll(".link");

pwShowHide.forEach(eyeIcon => {
eyeIcon.addEventListener("click", () => {
  let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
  
  pwFields.forEach(password => {
      if(password.type === "password"){
          password.type = "text";
          eyeIcon.classList.replace("bx-hide", "bx-show");
          return;
      }
      password.type = "password";
      eyeIcon.classList.replace("bx-show", "bx-hide");
  })
  
})
})      

links.forEach(link => {
link.addEventListener("click", e => {
 e.preventDefault();
 forms.classList.toggle("show-signup");
})
})
let otp=100000 + Math.floor(Math.random() * 900000);

function otpshow(){
  console.log(otp);
  let phone=document.getElementById("some-phone").value;
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "https://www.fast2sms.com/dev/bulkV2?authorization=kKWMSqVOH1sEciANUGwxJoZRYBFIumly8Dd450jbf63QtCareLFAd85VBlm12oYO3j9UCwx4f7Enpygc&route=otp&variables_values="+otp+"&flash=0&numbers="+phone);
  xhr.send();
  document.querySelector(".otp").style.display="block";
  document.getElementById("otpBt").style.display="none";
  document.getElementById("sbBt").type="submit";
  return true;

  // // document.querySelector(".otp").style.visibility="true";
}

// function otpvalidate(){
//   console.log(document.getElementById("otp").value);
//   if(document.getElementById("otp").value!=otp){
//     document.getElementById("sbBT").type="button";
//     // document.getElementById("sbBT").style.opacity="-1";
//   }
//   else{
//     document.getElementById("sbBT").type="submit";
//   }
// }



// Add error message element after input.
const button = document.getElementById("otpBt");
const sbBT = document.getElementById("sbBt");
button.disabled=true;
var n=false;
var m=false;
var p=false;
$('#some-name').on('input', function(evt) {
var name = document.getElementById("some-name").value;
var lblError = document.getElementById("nameError");
lblError.innerHTML = "";
var expr = /[A-Za-z]{3,}/;
if (!expr.test(name)) {
    lblError.innerHTML = "Invalid Name.";
    n=false;
}
else
{
  n=true;
}
})



$('#some-phone').on('input', function(evt) {
  var phone = document.getElementById("some-phone").value;
  // const button = document.getElementById("regBt");
  var lblError = document.getElementById("phoneError");
  lblError.innerHTML = "";
  var expr = /[6789][0-9]{9}/;
  if (!expr.test(phone)) {
      lblError.innerHTML = "Invalid Mobile Number.";
      m=false;
  }
  else
{
  m=true;
}
})
$('#some-pass').on('input', function(evt) {
  var pass = document.getElementById("some-pass").value;
  // const button = document.getElementById("regBt");
  var lblError = document.getElementById("passError");
  lblError.innerHTML = "";
  var expr = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
  if (!expr.test(pass)) {
      lblError.innerHTML = "Invalid Password.";
      p=false;
  }
  else
{
  p=true;
}
if(m===true && n===true && p===true){
  button.disabled=false;
}
else{
  button.disabled=true;
}
})

$('#otp').on('input', function(evt) {
var inputotp = document.getElementById("otp").value;
var lblError = document.getElementById("otpError");
lblError.innerHTML = "";

if (inputotp!=otp) {
    lblError.innerHTML = "Invalid OTP.";
}
else
{
  sbBT.removeAttribute("disabled");
}
})
