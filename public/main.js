import {toggleUserSection ,notificationSection}from "./js/userdropdown.js";
import Darkmode from "./js/darkmode.js";
import filterCategories from "./js/filterCategories.js";
import sideBar from "./js/sideBar.js";
import {ExpandPostThread} from "./js/expandBtn.js";
import categoriesCounter from "./js/categoriesCounter.js"

const accordion = document.getElementsByClassName('contentBoxFaq');

for (let i = 0; i<accordion.length; i++ ){
    
    accordion[i].addEventListener('click', function(){
        console.log('test')
        this.classList.toggle('active')
    })
}
//dropdown user
let userdropdown =document.querySelector(".userDropDown")
// let notification =document.querySelector("#notification")
// //event listener dropdown user
userdropdown.addEventListener("click",toggleUserSection)
// notification.addEventListener('click',notificationSection)
//button
// let darkModeBtn = document.querySelector("#darkmodeBtn");
//eventlistener
// darkModeBtn.addEventListener("click" , Darkmode)

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

categoriesCounter()
sideBar();
ExpandPostThread();