const value = document.querySelector(".range__value");
const input = document.querySelector(".range");

value.textContent = input.value + "€";
input.addEventListener("input", (event) => {
    value.textContent = event.target.value + "€";
});

let categoryOpen = false
let category = document.querySelector('.filterMenu__field--categories__content');
let categorySVG = document.querySelector('.filterMenu__field--categories__svg');
let categoryButton = document.querySelectorAll('.filterMenu__field--categories__button');

categoryButton.forEach((element) => {
    element.addEventListener('click', () => {
        categoryOpen = divDrawer(categoryOpen, category, categorySVG);
    })
})


let priceOpen = false
let price = document.querySelector('.filterMenu__field--price__content');
let priceSVG = document.querySelector('.filterMenu__field--price__svg');
let priceButton = document.querySelectorAll('.filterMenu__field--price__button');

priceButton.forEach((element) => {
    element.addEventListener('click', () => {
        priceOpen = divDrawer(priceOpen, price, priceSVG);
    })
})

let check = true
let checkbox = document.querySelectorAll('.filter__checkbox__input');
let checkboxSVG = document.querySelectorAll('.form__inputCheckbox__svg');

for (let i = 0; i !== checkbox.length ; i++) {
    checkbox[i].addEventListener('click', (event) => {
        check  = handleCheckbox(event, check, checkboxSVG[i])
    })
}


let filterOpen = false;
let filter = document.querySelector('.filterMenu');

document.addEventListener('click', (event) =>{
    filterOpen = handleOverlay(event, "filterMenu__button",filterOpen, filter, 'translateX(-40vw)');
})

function divDrawer(drawerOpen, drawer, drawerSVG){
    if (!drawerOpen){
        drawer.style.display = 'flex';
        drawer.style.opacity = '1';
        drawerSVG.innerHTML = svgUp
        return true;
    }
    else {
        drawer.style.display = 'none';
        drawer.style.opacity = '0';
        drawerSVG.innerHTML = svgDown;
        return false;
    }
}

const svgUp = '<path d="M4.08187 15.0498L10.6019 8.5298C11.3719 7.7598 12.6319 7.7598 13.4019 8.5298L19.9219 15.0498" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>'

const svgDown = '<path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>'


function handleCheckbox(event, check, checkboxSVG){
    if (!check  && event.target.type === 'checkbox'){
        checkboxSVG.innerHTML = svgCheck
        return true;
    }
    else if (check && event.target.type === 'checkbox'){
        checkboxSVG.innerHTML = svgUnCheck
        return false;
    }
}

const svgCheck = '<path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M7.75 11.9999L10.58 14.8299L16.25 9.16992" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>'

const svgUnCheck = '<path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>'

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
