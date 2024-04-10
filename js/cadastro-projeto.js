document.addEventListener("DOMContentLoaded", function () {
    const nomeProjetoInput = document.getElementById("nomeProjeto");
    const tipoProjetoInput = document.getElementById("tipoProjeto");
    const clienteProjetoInput = document.getElementById("clienteProjeto");
    const codigoProjetoInput = document.getElementById("codigoProjeto");
    const formularioProjeto = document.getElementById("cadastroProjetoForm");

    // Função para atualizar o código do projeto
    function atualizarCodigoProjeto() {
        const nomeProjeto = nomeProjetoInput.value;
        const tipoProjeto = tipoProjetoInput.value;
        const clienteProjeto = clienteProjetoInput.value;

        const codigoGerado = `${tipoProjeto}-${nomeProjeto}-${clienteProjeto.substring(0, 4)}`;
        codigoProjetoInput.value = codigoGerado;
    }

    // Adiciona eventos de input para os campos relevantes
    nomeProjetoInput.addEventListener("input", atualizarCodigoProjeto);
    tipoProjetoInput.addEventListener("input", atualizarCodigoProjeto);
    clienteProjetoInput.addEventListener("input", atualizarCodigoProjeto);

});

function maiusc(string) {
    res = string.value.toUpperCase();
    string.value = res;
}

