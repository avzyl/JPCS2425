function loadHome() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'templates/home.html', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('home').innerHTML += xhr.responseText;
        }
    };
    xhr.send();
}
loadHome();