function loadProducts(){
    fetch('products.php')
    .then(function(res) {return res.text();})
    .then(text => document.getElementById('termekek').innerHTML = text);
}