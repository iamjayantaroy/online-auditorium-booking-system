
let slideIndex = 0;

function showSlides() {
    const slides = document.querySelectorAll('.slides li');
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = 'block';
    setTimeout(showSlides, 4000); 
}

window.onload = function () {
    showSlides();
    rating();
};

var icon = document.querySelector("#icon");
    var nav = document.querySelector(".navbar");
function change(){
    var icon = document.querySelector("#icon");
    var nav = document.querySelector(".navbar");
    if(icon.className == "fa-solid fa-moon"){
        document.bgColor = "black";
        nav.style.backgroundcolor = ' #ffc107';
        icon.className = "fa-solid fa-sun";
        icon.style.color ='black';
    }
    else if(icon.className == "fa-solid fa-sun"){
        document.bgColor = "white";
        nav.style.backgroundcolor = ' #ffc107';
        icon.className = "fa-solid fa-moon";
        icon.style.color = ' black';
    }
}
// const input = document.getElementById("input");
// const clearButton = document.getElementById("clear-button");

// input.addEventListener("input", function () {
//     if (input.value.trim() !== "") {
//         clearButton.style.display = "block";
//     } else {
//         clearButton.style.display = "hidden";
//     }
// });

// clearButton.addEventListener("click", function () {
//     input.value = "";
//     clearButton.style.display = "none";
// });
    


function fvrt(heart) {

if(heart.name=="heart-outline"){
heart.name="heart";
heart.style.color="red";

}
else if(heart.name=="heart"){
heart.name="heart-outline";
heart.style.color="white";

}        
}

function rating() {
    let star = document.querySelectorAll('.star i');
    for (let i = 0; i < 3; i++) {
        star[i].style.color = "#fbb234";
    }
}

function search(){
  var name = document.getElementById("input").value;
  console.log(name);
  window.location.href = "http://127.0.0.1/Project/User/frontpage/index3.php?name="+name;
}

function mainpageshow(id){

window.location.href = "http://127.0.0.1/Project/User/auditorium_main_page/index.php?id="+id;

}
function placelocation(lat,long){

window.location.href = "http://127.0.0.1/Project/User/frontpage/index2.php?lat="+lat+"&long="+long;

}

function userlocation(){
     if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      console.log("Latitude: " + latitude);
      console.log("Longitude: " + longitude);
      window.location.href = "http://127.0.0.1/Project/User/frontpage/index2.php?lat="+latitude+"&long="+longitude;
    });
  } else {
    console.log("Geolocation is not supported by this browser.");
  }
}

var input = document.getElementById("input");
input.addEventListener("keypress", function(event) {
  
  if (event.key === "Enter") {
    search();
  }
});



function myFunction() {
    document.getElementById("mylist").classList.toggle("show");
  }

  window.onclick = function(event) {
    if (!event.target.matches('.drop-btn')) {
      var dropdowns = document.getElementsByClassName("list");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }