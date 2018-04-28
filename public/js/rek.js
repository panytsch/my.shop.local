var rekList = document.querySelectorAll('.rek__item');
var overItem = (e) => {
    var span;
    var item = e.currentTarget;
    if (span = item.getElementsByClassName('price')[0])
    {
        span.setAttribute('prevPrice', span.innerText);
        span.innerText = +span.innerText - +span.innerText * 0.1;
        span.style.cssText = "  color: red; \
                                font-size: 140%; \
                                ";
        span.className = 'changedPrice';
    }
    item.title = 'Купон на скидку  - '+item.getAttribute('promo')+' – примените и получите скидку 10%';
};

var leaveItem = (e) => {
    var span = e.currentTarget.getElementsByClassName('changedPrice')[0];
    var price = span.getAttribute('prevPrice');
    span.innerText = price;
    span.className = 'price';
    span.style.cssText = "  color: black; \
                            font-size: 100%; \
                            ";
}

function makeid() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < 15; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

[...rekList].map(i => {
    i.setAttribute('promo', makeid());
    i.addEventListener("mouseover", overItem, false);
    i.addEventListener("mouseleave", leaveItem, false);
});