// function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
//     const R = 6371; // Radius of the earth in kilometers
//     const dLat = deg2rad(lat2 - lat1);
//     const dLon = deg2rad(lon2 - lon1);
  
//     const a =
//       Math.sin(dLat / 2) * Math.sin(dLat / 2) +
//       Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
  
//     const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
//     const distance = R * c; // Distance in km
//     return distance;
//   }
  
//   function deg2rad(deg) {
//     return deg * (Math.PI / 180);
//   }
  
//   // Get user's location
//   navigator.geolocation.getCurrentPosition(
//     (position) => {
//       const userLat = position.coords.latitude;
//       const userLon = position.coords.longitude;
  
//       // Example location (replace with the desired location)
//       const targetLat = 25.393895361959085;
//       const targetLon = 88.406354323577;
  
//       // Calculate distance
//       const distance = getDistanceFromLatLonInKm(userLat, userLon, targetLat, targetLon);
  
//       console.log(`Distance between user and target: ${distance.toFixed(2)} km`);
//     },
//     (error) => {
//       console.error(`Error getting user location: ${error.message}`);
//     }
//   );

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


  $(".testmonial_slider_area").owlCarousel({
    autoplay: true,
    slideSpeed:1000,
    items : 3,
    loop: true,
    nav:true,
    navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
    margin: 30,
    dots: true,
    
    
});

function search(){
  var name = document.getElementById("input").value;
  console.log(name);
  window.location.href = "http://127.0.0.1/Project/User/frontpage/index3.php?name="+name;
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
