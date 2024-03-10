let totalQty = document.querySelector('.order__aside__section__price--qty');
let qty = document.querySelectorAll('.order__aside__section--qty');
let totalNumberQty = 0;

qty.forEach(elt => {
    totalNumberQty += parseInt(elt.textContent);
});

totalQty.textContent = totalNumberQty


let total = document.querySelector('.order__aside__section__price--total');
let prices = document.querySelectorAll('.order__aside__section__price--number');
let totalNumber = 0;

prices.forEach(price => {
    totalNumber += parseFloat(price.textContent);
});

total.textContent = totalNumber
