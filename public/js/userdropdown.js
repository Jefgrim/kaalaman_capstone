let userSection= document.querySelector("#userSection") ;
let notification =document.querySelector(".notificationContainer");

const toggleUserSection = () => {
    if(userSection.style.display == "none"){
        userSection.style.display = "flex"
    }
    else {
        userSection.style.display = "none"    
    }
}

const notificationSection = () => {
    if(notification.style.display == "none"){
        notification.style.display = "flex"
    }
    else {
        notification.style.display = "none"    
    }
}

export  {toggleUserSection ,notificationSection};