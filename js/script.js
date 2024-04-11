const $html = document.querySelector('html');
const $checkbox = document.querySelector('#switch');

// Adiciona um ouvinte de evento ao checkbox
$checkbox.addEventListener('change', function(){
    // Alterna a classe light-mode no elemento html
    $html.classList.toggle('light-mode');
    // Armazena o estado do switch localmente
    localStorage.setItem("switchState", $html.classList.contains('light-mode') ? "light-mode" : "");
});

$(document).ready(function() {
    // Verifica se o estado do switch foi armazenado localmente
    var switchState = localStorage.getItem("switchState");

    // Se o estado do switch estiver armazenado localmente, atualiza o estado do switch
    if (switchState === "light-mode") {
        // Se estiver em modo claro, adiciona a classe light-mode no elemento html
        $html.classList.add("light-mode");
        // Marca o checkbox como marcado
        $("#switch").prop("checked", true);
    } else {
        // Se estiver em modo escuro, remove a classe light-mode do elemento html
        $html.classList.remove("light-mode");
        // Marca o checkbox como desmarcado
        $("#switch").prop("checked", false);
    }
});
