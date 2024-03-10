let check = false
let checkbox = document.querySelector('.contact__inputCheckbox__input');
let checkboxSVG = document.querySelector('.form__inputCheckbox__svg');

checkbox.addEventListener('click', (event) => {
        check  = handleCheckbox(event, check, checkboxSVG)
})

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
