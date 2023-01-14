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

const accordion = document.getElementsByClassName('contentBoxFaq');

for (let i = 0; i<accordion.length; i++ ){
    
    accordion[i].addEventListener('click', function(){
        console.log('test')
        this.classList.toggle('active')
    })
}

liveUpdate();