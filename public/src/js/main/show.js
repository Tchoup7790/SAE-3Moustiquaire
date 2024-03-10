let descriptionOpen = false
let description = document.querySelector('.show__description__section--bottom__content');
let descriptionSVG = document.querySelector('.show__description__section--bottom__svg');
let descriptionButton = document.querySelectorAll('.show__description__section--bottom__button');

descriptionButton.forEach((element) => {
    element.addEventListener('click', () => {
        console.log(element);
        descriptionOpen = divDrawer(descriptionOpen, description, descriptionSVG);
    })
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