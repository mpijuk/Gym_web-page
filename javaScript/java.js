let selectImage = document.getElementById("1");
selectImage.classList.add("selected");

let topButton = document.querySelectorAll(".navigation .top-botun");

for( let i =0; i < topButton.length; i++)
{
    topButton[i].addEventListener("click", HandleClicked);
}

function HandleClicked(e)
{
    let currentButton = e.currentTarget;
    let lastButton = document.querySelector(".navigation .active");

    lastButton.classList.remove("active");
    currentButton.classList.add("active");
   
}

let menu = document.querySelector('#menu-btn');

menu.onclick = () =>{
    var x = document.querySelector(".links");

    if (x.className === "links") {
      x.className += " responsive";
    } 
    else {
      x.className = "links";
    }
};

var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");

  for (i = 0; i < slides.length; i++) 
  {
    slides[i].style.display = "none";
  }

  slideIndex++;
  if (slideIndex > slides.length) 
  {
    slideIndex = 1;
  }

  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}