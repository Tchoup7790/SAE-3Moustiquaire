let total = document.querySelector('.cart__aside__section__price--total');
let prices = document.querySelectorAll('.cart__aside__section__price--number');
let totalNumber = 0;

prices.forEach(price => {
    totalNumber += parseFloat(price.textContent);
});

total.textContent = totalNumber


