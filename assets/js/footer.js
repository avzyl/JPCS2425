/*============================ FOOTER ===============================*/
function loadFooter() {
    console.log("Loading footer...");
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'templates/footer.html', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log("Footer loaded successfully");
                document.querySelector('footer').innerHTML = xhr.responseText;
                // Reinitialize Scroll Reveal
                ScrollReveal().reveal('footer *', { delay: 200 });
            } else {
                console.error("Failed to load footer:", xhr.status, xhr.statusText);
            }
        }
    };
    xhr.send();
}

document.addEventListener('DOMContentLoaded', function () {
    loadFooter();
});
