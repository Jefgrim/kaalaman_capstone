import toggleUserSection from "./js/userdropdown.js";
import Darkmode from "./js/darkmode.js";
import filterCategories from "./js/filterCategories.js";


//dropdown user
let userdropdown =document.querySelector(".userDropDown")

// //event listener dropdown user
userdropdown.addEventListener("click",toggleUserSection)
//button
let darkModeBtn = document.querySelector("#darkmodeBtn");
//eventlistener
darkModeBtn.addEventListener("click" , Darkmode)

let technologyBtn = document.querySelector("#technologyBtn")
let ecommerceBtn = document.querySelector("#ecommerceBtn")
let healthBtn = document.querySelector("#healthBtn")
let gameBtn = document.querySelector("#gameBtn")
let foodBtn = document.querySelector("#foodBtn")


technologyBtn.addEventListener("change",filterCategories)
ecommerceBtn.addEventListener("change",filterCategories)
healthBtn.addEventListener("change",filterCategories)
gameBtn.addEventListener("change",filterCategories)
foodBtn.addEventListener("change",filterCategories)