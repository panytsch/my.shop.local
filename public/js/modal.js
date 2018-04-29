let modal = document.getElementById('supermodal');
let clickModal = () => {
    modal.click();
};

let a = document.getElementById('myModal');
let arr = a.getElementsByTagName('button');
[...arr].map(i => {
    i.onclick = () => {
        window.localStorage.closed = 1;
    }
});

if (!window.localStorage.closed){
    setTimeout(clickModal, 1000);
}