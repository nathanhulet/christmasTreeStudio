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
  var lightsArray = ["EMPTY.svg.png", "LightsBlue.gif", "LightsYellow.gif", "LightsRed.gif"];
  function updateLights() {

    var slide = document.getElementById('LightsSlider');
    var lightsImg = document.getElementById('Lights');
    var newImage = "resources/" + lightsArray[slide.value];
    lightsImg.src = newImage;
  }

  //SKIRTS
  var skirtArray = ["EMPTY.svg.png", "skirtred.gif"];
  function updateSkirts() {

    var slide = document.getElementById('SkirtSlider');
    var skirtImg = document.getElementById('Skirt');
    var newImage = "resources/" + skirtArray[slide.value];
    skirtImg.src = newImage;
  }

  //GARLANDS
  var garlandArray = ["EMPTY.svg.png", "garlandgold.gif", "garlandRedBlueGreen.gif"];
  function updateGarlands() {

    var slide = document.getElementById('GarlandSlider');
    var garlandImg = document.getElementById("Garland");
    var newImage = "resources/" + garlandArray[slide.value];
    garlandImg.src = newImage;
}

//STANDS
var standArray = ["EMPTY.svg.png", "metalStand.gif", "plasticStand.gif"];
function updateStands() {
  var slide = document.getElementById('StandSlider');
  var StandImg = document.getElementById("Stand");
  var newImage = "resources/" + standArray[slide.value];
  StandImg.src = newImage;
  var trunk = document.getElementById("trunk");
  ;
  if (slide.value >= 1) {
    trunk.src = "resources/EMPTY.svg.png";
    document.getElementById('Skirt').style.bottom = "620px";
  }
  else {
    trunk.src = "resources/trunk.gif";
    document.getElementById('Skirt').style.bottom = "600px";
  }
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

  for (var i = 0; i < 100; ++i)
  {
    createFlake();
  }

  function toggleSnow() {
    var myBool = document.getElementById('snowy').value = 'true';
    myBool = !myBool;
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

function saveDesign() {
  var title = prompt("Enter a title for your design:");
  document.getElementById('designTitle').value = title;
  document.getElementById("myForm").submit();
}

function loadDesign() {
  var load = prompt("Enter a title to load:");
  document.getElementById('loadTitle').value = load;
  document.getElementById("myForm").submit();
}
