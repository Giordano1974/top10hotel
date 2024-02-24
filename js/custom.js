
// Aggiungi un event listener al pulsante

document.addEventListener("DOMContentLoaded", (event) => {
    
    document.querySelectorAll(".ispirami").forEach(function(element) {
        element.addEventListener("click", function(event) {
            // Crea una nuova richiesta AJAX
            var xhr = new XMLHttpRequest();
    
            var lang = element.dataset.language; // Accedi al dataset dell'elemento corrente
            // Imposta il metodo e l'URL della richiesta
            xhr.open("GET", "/wp-json/tripp-xt/v1/random_post?lang=" + lang + "&time=" + Date.now(), true);
    
            // Gestisci la risposta
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    window.location.href = response.link; // Usa window.location.href per reindirizzare alla pagina
                }
            };
    
            // Invia la richiesta
            xhr.send();
        });
    });
    
});


var textBlocks = document.querySelectorAll('.hotel-item__description');

textBlocks.forEach(function(el){
    var isOverflowing = el.clientHeight < el.scrollHeight;
    var cta = el.nextElementSibling;
    if (isOverflowing) {
        el.classList.add("has-read-more");
        cta.querySelector('.text-read-more').addEventListener('click', function(event){
            el.classList.toggle("open");
        })
    }
});