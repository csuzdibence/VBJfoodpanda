function addToCart(productHTML) {
    let name = productHTML.getElementsByClassName('termekNev')[0].innerHTML;
    let ar = parseInt(productHTML.getElementsByClassName('ar')[0].innerHTML);
    let kosar = document.getElementById('kosar');
    let osszesitoElem = document.getElementById('sumMoney');
    osszesitoElem.innerHTML = parseInt(osszesitoElem.innerHTML) + ar;
    let id = productHTML.getElementsByClassName("azonosito")[0].innerHTML;

    if (!kosar.innerHTML.includes(name)) {
        kosar.innerHTML += `<div class="kosarElem"><p>${name}</p><p>${ar}</p><p class="darab">1</p><button onclick="subtractFromCart('${name}')">-</button></div>`;
    }
    else {
        let kosarElemek = Array.from(kosar.getElementsByClassName('kosarElem'));
        let kosarElem = kosarElemek.find(elem => elem.innerHTML.includes(name));
        let darabElem = kosarElem.getElementsByClassName('darab')[0];
        darabElem.innerHTML = Number.parseInt(darabElem.innerHTML) + 1;
    }
    fetch("addToCart.php?id="+id)
        .then(function (res) {
            return res.text();
        }).then(text => console.log(text));
}

function subtractFromCart(productName) {
    let termek = Array.from(document.getElementsByClassName('termekSzoveg')).find(x => x.innerHTML.includes(productName));
    let ar = parseInt(termek.getElementsByClassName('ar')[0].innerHTML);
    let osszesitoElem = document.getElementById('sumMoney');
    let kosar = document.getElementById('kosar');
    osszesitoElem.innerHTML = parseInt(osszesitoElem.innerHTML) - ar;
    if (kosar.innerHTML.includes(productName)) {
        let kosarElem = Array.from(kosar.getElementsByClassName('kosarElem')).find(x => x.innerHTML.includes(productName));
        let darabElem = kosarElem.getElementsByClassName('darab')[0];
        if (parseInt(darabElem.innerHTML) == 1) {
            kosarElem.remove();
        }
        else{
            darabElem.innerHTML = Number.parseInt(darabElem.innerHTML) - 1;
        }
    }

    fetch("subtractFromCart.php?name="+productName).then(res => res.text()).then(text => console.log(text));
}

function loadCart(){
    fetch('getCart.php').then((res) => res.text())
    .then((text) => document.getElementById('kosar').innerHTML = text);
}