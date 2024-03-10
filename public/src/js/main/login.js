let toggle = false
let toggler = document.querySelector('.login__div__svg');
let input = document.querySelector('.login__div__input');

toggler.addEventListener("mousedown", () => {
    toggle = handlePass(toggle, input, toggler);
});

toggler.addEventListener("mouseup", () => {
    toggle = handlePass(toggle, input, toggler);
});

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

const svgEye = '<path d="M19.4749 15.4999C19.4749 17.9749 17.4749 19.9749 14.9999 19.9749C12.5249 19.9749 10.5249 17.9749 10.5249 15.4999C10.5249 13.0249 12.5249 11.0249 14.9999 11.0249C17.4749 11.0249 19.4749 13.0249 19.4749 15.4999Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M14.9998 25.8374C19.4123 25.8374 23.5248 23.2374 26.3873 18.7374C27.5123 16.9749 27.5123 14.0124 26.3873 12.2499C23.5248 7.7499 19.4123 5.1499 14.9998 5.1499C10.5873 5.1499 6.4748 7.7499 3.6123 12.2499C2.4873 14.0124 2.4873 16.9749 3.6123 18.7374C6.4748 23.2374 10.5873 25.8374 14.9998 25.8374Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>';
const svgEyeSlash = '<path d="M18.1609 11.8374L11.8359 18.1624C11.0234 17.3499 10.5234 16.2374 10.5234 14.9999C10.5234 12.5249 12.5234 10.5249 14.9984 10.5249C16.2359 10.5249 17.3484 11.0249 18.1609 11.8374Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M22.2758 7.2126C20.0883 5.5626 17.5883 4.6626 15.0008 4.6626C10.5883 4.6626 6.47578 7.2626 3.61328 11.7626C2.48828 13.5251 2.48828 16.4876 3.61328 18.2501C4.60078 19.8001 5.75078 21.1376 7.00078 22.2126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M10.5234 24.4126C11.9484 25.0126 13.4609 25.3376 14.9984 25.3376C19.4109 25.3376 23.5234 22.7376 26.3859 18.2376C27.5109 16.4751 27.5109 13.5126 26.3859 11.7501C25.9734 11.1001 25.5234 10.4876 25.0609 9.9126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M19.3883 15.875C19.0633 17.6375 17.6258 19.075 15.8633 19.4" stroke="#02081A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M11.8375 18.1626L2.5 27.5001" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M27.5016 2.5L18.1641 11.8375" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>';