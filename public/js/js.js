var randField = document.querySelector('#randomField');
var changeText = () => {
    randField.innerText = parseInt(Math.random() * 5);
};

if (randField) {
    setInterval(changeText, 3000);
}