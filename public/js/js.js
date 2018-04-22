var randField = document.querySelector('#randomField');
var changeText = () => {
    randField.innerText = parseInt(Math.random() * 5);
};
console.log(randField);

if (randField) {
    setInterval(changeText, 3000);
}
