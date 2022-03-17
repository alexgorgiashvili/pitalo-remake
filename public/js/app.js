

// //  Sign in Form
// $(".change-form-btn1 , .more-sign-click").click(function (e) { 
//     e.preventDefault();
//      $(".pos-form-1").animate({"right" : "100%"},100)
//      $(".pos-form-2").animate({"left" : "0"},100)
//      $(".sign-form-main").animate({"height": "260px"},100)
//      $(".forget-pass").hide()
//      $(".faded-p").hide()
    
//   });
  
//   $(".change-form-btn").click(function (e) { 
//     e.preventDefault();
//      $(".pos-form-1").animate({"right" : "0%"},100)
//      $(".pos-form-2").animate({"left" : "100%"},100)
//      $(".sign-form-main").animate({"height": "230px"},100)
//      $(".forget-pass").fadeIn(800)
//      $(".faded-p").fadeIn(800)
    
//   });
  
  
//   $(".sign-btn").click(function (e) { 
//     e.preventDefault();
//     $(".fade-main-form").fadeIn(300).addClass("sign-cont-effects")
    
//   });
//   $(".sign-x-icon").click(function (e) { 
//     e.preventDefault();
//     $(".fade-main-form").hide().removeClass("sign-cont-effects")
    
//   });



// Geo Inputs
let geoinput = $(".geo_input");
let gearea = $(".geo_input_area");
$(document).on("keypress", geoinput, function (event) {
    return suppressNonEng(event);
});

function suppressNonEng(EventKey) {
var key = EventKey.which || EventKey.keyCode;
console.log(key);
if (key < 4304 || key > 4336)  { 
    $(".geo_key").text("წერე ქართულად!");
    setInterval(function(){ 
        $(".geo_key").empty();
      }, 2000);
     return false; 
    }else {
     return true; }
}
$(document).on("keypress", geoarea, function (event) {
    return suppressNonEng(event);
});

function suppressNonEng(EventKey) {
var key = EventKey.which || EventKey.keyCode;
console.log(key);
if(key > 122 || key < 97)
{
    return true;
}
if (key < 4304 || key > 4336)  { 
    $(".geo_key_area").text("წერე ქართულად!");
    setInterval(function(){ 
        $(".geo_key_area").empty();
      }, 2000);
     return false; 
}else{
    return true;
}
}
    
  
