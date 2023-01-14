import toggleUserSection from "./js/userdropdown.js";
import Darkmode from "./js/darkmode.js";
import liveUpdate from "./js/liveupdate.js";


//dropdown user
let userdropdown =document.querySelector(".userDropDown")

// //event listener dropdown user
userdropdown.addEventListener("click",toggleUserSection)
//button
let darkModeBtn = document.querySelector("#darkmodeBtn");
//eventlistener
darkModeBtn.addEventListener("click" , Darkmode)

liveUpdate();
 