function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

//Functions to link sliders to images
function updateALL() {
  updatePines();
  updateLights();
  updateBulbs();
}

  //PINES
  var treeArray = ["PinesGreen.gif", "PinesSnowy.gif", "PinesGold.gif", "PinesWhite.gif"];
  function updatePines() {

    var slide = document.getElementById('PinesSlider');
    var pineImg = document.getElementById('Pines');
   var newImage = "resources/" + treeArray[slide.value];
   pineImg.src = newImage;
  }

  //ORNAMENTS
  var bulbArray = ["EMPTY.svg.png", "BulbsBlue.gif", "BulbsGreen.gif"];
  function updateBulbs() {

    var slide = document.getElementById('BulbsSlider');
    var bulbImg = document.getElementById('Bulbs');
    var newImage = "resources/" + bulbArray[slide.value];
    bulbImg.src = newImage;
  }

  //LIGHTS
  var lightsArray = ["EMPTY.svg.png", "LightsBlue.gif", "LightsYellow.gif"];
  function updateLights() {

    var slide = document.getElementById('LightsSlider');
    var bulbImg = document.getElementById('Lights');
    var newImage = "resources/" + lightsArray[slide.value];
    bulbImg.src = newImage;
  }


// Scripts for generating snow
const flake = document.querySelector(".flake");
const container = document.querySelector(".treeContainer");

  function createFlake() {

    // cloning the flake node
    const clone = flake.cloneNode(true);

    // creating left padding
    clone.style.paddingLeft = Math.random() * 3 + "vw";
    clone.style.top = 0 + "px";

    // animation duration between 3-5
    clone.style.animationDuration = Math.random() * 6 + 2 + "s";
    clone.style.opacity = Math.random() * 1;;
    clone.id = "flake";
    container.append(clone); // adding clone flake to container
  }

  // to create more flakes decrease 100
  const s = setInterval(createFlake, 80);


  setTimeout(() => {
    clearInterval(s);
  }, 4500); // flake creation stops after 3000 milliseconds or 3s

  function toggleSnow() {
    var ele = document.getElementsByClassName("flake");
    var checkBox = document.getElementById("snowCheck");
    if (checkBox.checked) {
      for (var i = 0; i < ele.length; i++ ) {
        ele[i].style.visibility = "visible";
      }
    }
    else {
      for (var i = 0; i < ele.length; i++ ) {
        ele[i].style.visibility = "hidden";
      }
    }
  }
