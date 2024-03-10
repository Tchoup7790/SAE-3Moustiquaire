let searchOpen = false;
let searchBar = document.querySelector('.searchBar');

document.addEventListener('click', (event) =>{
    searchOpen = handleOverlay(event, "searchBar__button", searchOpen, searchBar, 'translateY(30rem)');
})

function handleOverlay(event, overlayButtonClass, overlayOpen, overlay, transformValue) {
    if(event.target.classList.contains(overlayButtonClass) && overlayOpen === false){
        overlay.style.transform = transformValue;
        document.querySelector('.overlayScreen').style.zIndex = '3';
        document.querySelector('.overlayScreen').style.opacity = '1';
        document.querySelector('body').style.overflow = 'hidden';
        return true;
    }
    else if (overlayOpen === true && (event.target.classList.contains("overlayScreen")|| event.target.classList.contains(overlayButtonClass))){
        overlay.style.transform = 'translate(0)';
        document.querySelector('.overlayScreen').style.zIndex = '-1';
        document.querySelector('.overlayScreen').style.opacity = '0';
        document.querySelector('body').style.overflowY = 'scroll';
        return false;
    }
    else{
        return overlayOpen;
    }
}
