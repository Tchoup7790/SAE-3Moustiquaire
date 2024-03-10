let toggle = [false, false]
let toggler = document.querySelectorAll('.create__div__svg');
let input = document.querySelectorAll('.create__div__input');

for (let i = 0; i !== toggler.length ; i++) {
    toggler[i].addEventListener("mousedown", () => {
        toggle[i] = handlePass(toggle[i], input[i], toggler[i]);
    });

    toggler[i].addEventListener("mouseup", () => {
        toggle[i] = handlePass(toggle[i], input[i], toggler[i]);
    });
}


let check = false
let checkbox = document.querySelectorAll('.create__inputCheckbox__input');
let checkboxSVG = document.querySelectorAll('.form__inputCheckbox__svg');

for (let i = 0; i !== checkbox.length ; i++) {
    checkbox[i].addEventListener('click', (event) => {
        check  = handleCheckbox(event, check, checkboxSVG[i])
    })
}

function handlePass(bool, pass, passSVG){
    if (!bool){
        passSVG.innerHTML = svgEye
        pass.type = 'text';
        return true;
    }
    else if (bool){
        passSVG.innerHTML = svgEyeSlash
        pass.type = 'password';
        return false;
    }
}

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

const svgEye = '<path d="M19.4749 15.4999C19.4749 17.9749 17.4749 19.9749 14.9999 19.9749C12.5249 19.9749 10.5249 17.9749 10.5249 15.4999C10.5249 13.0249 12.5249 11.0249 14.9999 11.0249C17.4749 11.0249 19.4749 13.0249 19.4749 15.4999Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M14.9998 25.8374C19.4123 25.8374 23.5248 23.2374 26.3873 18.7374C27.5123 16.9749 27.5123 14.0124 26.3873 12.2499C23.5248 7.7499 19.4123 5.1499 14.9998 5.1499C10.5873 5.1499 6.4748 7.7499 3.6123 12.2499C2.4873 14.0124 2.4873 16.9749 3.6123 18.7374C6.4748 23.2374 10.5873 25.8374 14.9998 25.8374Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>';
const svgEyeSlash = '<path d="M18.1609 11.8374L11.8359 18.1624C11.0234 17.3499 10.5234 16.2374 10.5234 14.9999C10.5234 12.5249 12.5234 10.5249 14.9984 10.5249C16.2359 10.5249 17.3484 11.0249 18.1609 11.8374Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M22.2758 7.2126C20.0883 5.5626 17.5883 4.6626 15.0008 4.6626C10.5883 4.6626 6.47578 7.2626 3.61328 11.7626C2.48828 13.5251 2.48828 16.4876 3.61328 18.2501C4.60078 19.8001 5.75078 21.1376 7.00078 22.2126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M10.5234 24.4126C11.9484 25.0126 13.4609 25.3376 14.9984 25.3376C19.4109 25.3376 23.5234 22.7376 26.3859 18.2376C27.5109 16.4751 27.5109 13.5126 26.3859 11.7501C25.9734 11.1001 25.5234 10.4876 25.0609 9.9126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M19.3883 15.875C19.0633 17.6375 17.6258 19.075 15.8633 19.4" stroke="#02081A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M11.8375 18.1626L2.5 27.5001" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M27.5016 2.5L18.1641 11.8375" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>';
