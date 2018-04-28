let input = document.getElementById('searchInput');
let res = document.getElementById('resSearch');
input.onkeyup = (e) =>{
    let val = e.currentTarget.value;
    if (val){
        let r = new XMLHttpRequest();
        r.onreadystatechange = () =>{
            res.innerHTML = r.responseText;
        };
        r.open('GET', '/user/search/?a='+val, true);
        r.send();
    }
};